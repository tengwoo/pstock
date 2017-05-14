<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rebate".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $time_expired
 * @property integer $state
 */
class Rebate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rebate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'state'], 'integer'],
            [['time_expired'], 'safe'],
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
            'time_expired' => 'Time Expired',
            'state' => 'State',
        ];
    }

    /**
     * @inheritdoc
     * @return RebateQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RebateQuery(get_called_class());
    }
}
