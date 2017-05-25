<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order_stock_history".
 *
 * @property integer $id
 * @property string $order_sn
 * @property integer $user_id
 * @property integer $stock_id
 * @property string $stock_name
 * @property string $stock_code
 * @property integer $state
 * @property string $time_created
 * @property string $time_finished
 * @property integer $times
 * @property string $amount_profit
 * @property string $amount_lose
 * @property integer $count
 * @property string $price
 * @property string $amount_deposit
 * @property string $amount_tax
 * @property string $amount_coupon
 * @property string $amount_total
 * @property string $amount_paid
 * @property integer $is_checkout
 * @property string $checkout_price
 * @property string $checkout_desc
 * @property integer $is_forward
 */
class OrderStockHistory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_stock_history';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'stock_id', 'state', 'times', 'count', 'is_checkout', 'is_forward'], 'integer'],
            [['time_created', 'time_finished'], 'safe'],
            [['amount_profit', 'amount_lose', 'price', 'amount_deposit', 'amount_tax', 'amount_coupon', 'amount_total', 'amount_paid', 'checkout_price'], 'number'],
            [['order_sn'], 'string', 'max' => 16],
            [['stock_name', 'stock_code'], 'string', 'max' => 32],
            [['checkout_desc'], 'string', 'max' => 255],
            [['order_sn'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_sn' => 'Order Sn',
            'user_id' => 'User ID',
            'stock_id' => 'Stock ID',
            'stock_name' => 'Stock Name',
            'stock_code' => 'Stock Code',
            'state' => 'State',
            'time_created' => 'Time Created',
            'time_finished' => 'Time Finished',
            'times' => 'Times',
            'amount_profit' => 'Amount Profit',
            'amount_lose' => 'Amount Lose',
            'count' => 'Count',
            'price' => 'Price',
            'amount_deposit' => 'Amount Deposit',
            'amount_tax' => 'Amount Tax',
            'amount_coupon' => 'Amount Coupon',
            'amount_total' => 'Amount Total',
            'amount_paid' => 'Amount Paid',
            'is_checkout' => 'Is Checkout',
            'checkout_price' => 'Checkout Price',
            'checkout_desc' => 'Checkout Desc',
            'is_forward' => 'Is Forward',
        ];
    }

    /**
     * @inheritdoc
     * @return OrderStockHistoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OrderStockHistoryQuery(get_called_class());
    }

    public static function latestByUser($user_id, $count = 10){
        return static::find()
            ->where(['user_id' => $user_id])
            ->orderBy('time_finished DESC')
            ->limit($count)
            ->all();
    }
}
