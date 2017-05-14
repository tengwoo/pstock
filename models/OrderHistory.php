<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order_history".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $stock_id
 * @property string $stock_name
 * @property string $stock_code
 * @property integer $type
 * @property integer $state
 * @property string $time_created
 * @property string $time_finished
 * @property integer $times
 * @property integer $count
 * @property string $price
 * @property string $amount_deposit
 * @property string $amount_tax
 * @property string $amount_coupon
 * @property string $amount_total
 * @property string $amount_paid
 */
class OrderHistory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_history';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'stock_id', 'type', 'state', 'times', 'count'], 'integer'],
            [['time_created', 'time_finished'], 'safe'],
            [['price', 'amount_deposit', 'amount_tax', 'amount_coupon', 'amount_total', 'amount_paid'], 'number'],
            [['stock_name', 'stock_code'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'stock_id' => 'Stock ID',
            'stock_name' => 'Stock Name',
            'stock_code' => 'Stock Code',
            'type' => 'Type',
            'state' => 'State',
            'time_created' => 'Time Created',
            'time_finished' => 'Time Finished',
            'times' => 'Times',
            'count' => 'Count',
            'price' => 'Price',
            'amount_deposit' => 'Amount Deposit',
            'amount_tax' => 'Amount Tax',
            'amount_coupon' => 'Amount Coupon',
            'amount_total' => 'Amount Total',
            'amount_paid' => 'Amount Paid',
        ];
    }

    /**
     * @inheritdoc
     * @return OrderHistoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OrderHistoryQuery(get_called_class());
    }
}
