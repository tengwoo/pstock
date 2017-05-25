<?php
namespace app\modules\service\stock;

use app\modules\service\Service;
use app\models\OrderStock as Order;
use app\models\OrderStockHistory as OrderHistory;
use app\models\UserFinance;
use app\models\Stock;
use app\models\FundLog;

use yii;

/**
 * @Service
 * @descriptoin
 * 股票服务类
 */
class StockService extends Service {
	private $transTimeout = 20.0; # 交易超时时间, 单位秒
	private $prefix = "S";


	function genOrderSn() {
		Yii::$app->mutex->acquire("stockMutex");
		if (($orderSn = Yii::$app->cache->get('orderSn')) !== false) {
			Yii::$app->cache->set('orderSn', (++$orderSn) % 1000);
		} else {
			$orderSn = 1;
			Yii::$app->cache->set('orderSn', $orderSn);
		}
		Yii::$app->mutex->release("stockMutex");
		return $this->prefix . date("ymdHis", time()) . sprintf("%03d", $orderSn);
	}
	
	/**
	 * @param string $account 帐号user_id
	 * @param string $stockCode 股票代码
	 * @param real   $price 股票价格
	 * @param real   $deposit 保证金
	 * @param real   $amount 本金
	 * @description
	 * 手续费计算公式 收费费 = 本金 * 数据库收费费比率
	 * 通过本金计算购买股票数量 股票数量 = 本金 / 股票价格 取百整
	 * @return string $orderNo 订单编号
	 */
	function buyStock($account,
			  $stockCode,
			  $price,
			  $deposit,
			  $amount) {
		$startTransTime = gettimeofday(true);
		$userFinance = UserFinance::find()->where(['user_id' => $account])->one();
		if ($userFinance == NULL)
			throw new StockServiceException("账户不存在!");

		$tax = $userFinance->ratio_tax * $amount; // 计算手续费
		if ($userFinance->balance < $deposit + $tax)
			throw new StockServiceException("账户余额不足!");

		$stock = Stock::find()->where(['code' => $stockCode])->one();

		if ($stock == NULL)
			throw new StockServiceException("股票代码不存在!");

		$stockCount = (int)($amount / $price);
		$stockCount = $stockCount - ($stockCount % 100); // 四舍五路取百整
		$order = new Order();
		$order->user_id = $account;
		$order->stock_id = $stock->id;
		$order->stock_code = $stock->code; # 股票代码
		$order->stock_name = $stock->name; # 股票名称
		$order->order_sn = $this->genOrderSn();
		$order->type = 0; # 0 买入 , 1 卖出
		$order->state = 1; # 0 新单， 1 成功，  2 失败
		$order->count = $stockCount; # 股票数量
		$order->price = $price; # 股票价格
		$order->amount_deposit = $deposit;
		$order->amount_tax = $tax; # 手续费
		$order->amount_total = $amount; # 本金
		$order->amount_paid = $deposit + $tax;

		$orderHistory = new OrderHistory();
		$orderHistory->user_id = $order->user_id;
		$orderHistory->stock_id = $order->stock_id;
		$orderHistory->stock_code = $order->stock_code;
		$orderHistory->stock_name = $order->stock_name;
		$orderHistory->order_sn = $order->order_sn;
		$orderHistory->type = $order->type;
		$orderHistory->state = $order->state;
		$orderHistory->count = $order->count;
		$orderHistory->price = $order->price;
		$orderHistory->amount_deposit = $order->amount_deposit;
		$orderHistory->amount_tax = $order->amount_tax;
		$orderHistory->amount_total = $order->amount_total;
		$orderHistory->amount_paid = $order->amount_paid;

		$fundLog = new FundLog();
		$fundLog->name = '股票交易';
		$fundLog->order_sn = $order->order_sn;
		$fundLog->flow = 1;
		$fundLog->amount = $order->amount_paid;
		$fundLog->type = 3;
		$fundLog->remark = '点买下单';
		# 开始进行交易
		$transaction = Order::getDb()->beginTransaction();
		try {
			$status = UserFinance::updateAllCounters(['balance' => -($deposit + $tax)], ['and', ['user_id' => $account], ['>=', 'balance', ($deposit + $tax)]]);
			if ($status == 0 || $status == false)
				throw new StockServiceException("帐号余额不足!");

			$status = $fundLog->save();

			if ($status == false)
				throw new StockServiceException("保存资金流水失败!");
			$status = $order->save();

			if ($status == false)
				throw new StockServiceException("下单失败!");

			$status = $orderHistory->save();

			if ($status == false)
				throw new StockServiceException("下单记录失败!");
			$endTransTime = gettimeofday(true);
			if ($endTransTime - $startTransTime > $this->transTimeout)
				throw new StockServiceException("交易超时!");
			$transaction->commit();
			return $order->order_sn;
		} catch (\Exception $e) {
			$transaction->rollback();
			throw $e;
		} catch (\Throwable $e) {
			$transaction->rollback();
			throw $e;
		}
	}

	/**
	 * @param string $account 帐号id
	 * @param string $orderSn 订单号
	 * @param real   $price 卖出价格
	 * @param string $desc 平仓原因, 例如: 手动平仓， 自动平仓
	 * @description
	 *
	 * @return string $orderNo 订单号
	 */
	function sellStock($account,
			   $orderSn,
			   $price,
	                   $desc = '手动平仓') {

		$startTransTime = gettimeofday(true);

		$order = Order::findOne(['order_sn' => $orderSn]);
	
		if ($order == NULL)
			throw new StockServiceException("订单不存在!");

		$orderHistory = OrderHistory::findOne(['order_sn' => $orderSn]);

		if ($orderHistory == NULL)
			throw new StockServiceException("订单不存在!");

		$buyPrice = $order->price;
		$morePrice = $price - $buyPrice;
		$moreMoney = round($order->amount_deposit + $order->count * $morePrice, 2);

		$orderHistory->checkout_price = $price;
		$orderHistory->is_checkout = 1;
		$orderHistory->checkout_desc = $desc;

		$fundLog = new FundLog();
		$fundLog->name = '股票交易';
		$fundLog->order_sn = $order->order_sn;
		$fundLog->flow = 0;
		$fundLog->amount = $moreMoney;
		$fundLog->type = 4;
		$fundLog->remark = '点卖';

		# 开始进行交易
		$transaction = Order::getDb()->beginTransaction();

		try {
			$status = UserFinance::updateAllCounters(['balance' => $moreMoney], ['user_id' => $account]);

			$status = $fundLog->save();

			if ($status == false)
				throw new StockServiceException("记录资金流水失败!");

			$status = $order->delete();

			if ($status == false)
				throw new StockServiceException("处理订单失败!");
			$finishedTime = date('Y-m-d H:i:s', time());
			$orderHistory->time_finished = $finishedTime;
			$status = $orderHistory->save();

			if ($status == false)
				throw new StockServiceException("处理订单记录失败!");

			$endTransTime = gettimeofday(true);

			if ($endTransTime - $startTransTime > $this->transTimeout)
				throw new StockServiceException("交易超时!");

			$transaction->commit();

			return $orderSn;
		} catch (\Exception $e) {
			$transaction->rollback();
			throw $e;
		} catch (\Throwable $e) {
			$transaction->rollback();
			throw $e;
		}
	}
}
?>
