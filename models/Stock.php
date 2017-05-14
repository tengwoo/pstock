<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "stock".
 *
 * @property integer $id
 * @property string $name
 * @property string $code
 * @property string $fullcode
 * @property string $time_updated
 * @property string $ratio_today
 * @property string $price_start
 * @property string $price_total
 */
class Stock extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'stock';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['time_updated'], 'safe'],
            [['ratio_today', 'price_start', 'price_total'], 'number'],
            [['name', 'code', 'fullcode'], 'string', 'max' => 32],
            [['code'], 'unique'],
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
            'code' => 'Code',
            'fullcode' => 'Fullcode',
            'time_updated' => 'Time Updated',
            'ratio_today' => 'Ratio Today',
            'price_start' => 'Price Start',
            'price_total' => 'Price Total',
        ];
    }

    /**
     * @inheritdoc
     * @return StockQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new StockQuery(get_called_class());
    }
}
