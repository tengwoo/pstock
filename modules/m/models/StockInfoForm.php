<?php

namespace app\modules\m\models;

use Yii;
use yii\base\Model;
use app\models\Stock;

class StockInfoForm extends Model
{
    private $stock = null;
    private $_stock = null;

    public $stock_sn;

    public $name;
    public $sn;
    public $price;
    public $direction;
    public $change;
    public $ratio;
    public $price_start;
    public $ratio_start;
    public $price_max;
    public $price_min;
    public $price_top;
    public $price_bottom;
    public $hands;
    public $amount;
    public $chart_time;
    public $chart_k;
    public $sell;
    public $sell_ratio;
    public $buy;
    public $buy_ratio;
    public $fullcode;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
//            [['order_sn',], 'required'],
            [['order_sn',], 'safe'],
        ];
    }

    public function getStock()
    {
        if (!$this->stock) {
            $stock = Stock::find()->filterWhere(['code' => $this->stock_sn])->limit(1)->one();
            $stock && $this->stock = $stock;
        }

        return $this->stock;
    }


    public function getData()
    {
        $this->_stock = 1;
        if(! $this->_stock){
            $url = 'http://finance.sina.com.cn/otc/activity/' . $this->getStock()->fullcode . '_info.js?_=' .
                floor(array_sum(explode(' ', microtime())) * 1000);

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HEADER, "Mozilla/5.0 (compatible; Baiduspider/2.0; +http://www.baidu.com/search/spider.html)");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, 0);

            $result = curl_exec($ch);
            $info = curl_getinfo($ch);
            curl_close($ch);
        }

        return $this->_stock;
    }

}
