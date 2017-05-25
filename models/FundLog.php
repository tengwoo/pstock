<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fund_log".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $name
 * @property string $order_sn
 * @property integer $flow
 * @property string $amount
 * @property integer $type
 * @property integer $trade_type
 * @property string $time_created
 * @property string $remark
 */
class FundLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fund_log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['flow', 'type', 'trade_type', 'user_id'], 'integer'],
            [['amount'], 'number'],
            [['trade_type'], 'required'],
            [['time_created'], 'safe'],
            [['remark'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['order_sn'], 'string', 'max' => 16],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'order_sn' => 'Order Sn',
            'user_id' => '用户ID',
            'flow' => 'Flow',
            'amount' => 'Amount',
            'type' => 'Type',
            'trade_type' => 'Trade Type',
            'time_created' => 'Time Created',
            'remark' => 'Remark',
        ];
    }

    /**
     * @inheritdoc
     * @return FundLogQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FundLogQuery(get_called_class());
    }
}
