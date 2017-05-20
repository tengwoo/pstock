<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_finance".
 *
 * @property integer $id
 * @property string $name
 * @property integer $user_id
 * @property string $ratio_deposit
 * @property integer $level_win
 * @property integer $level_lose
 * @property string $ratio_tax
 * @property string $balance
 * @property string $balance_lock
 * @property string $balance_should
 * @property integer $is_forward
 */
class UserFinance extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_finance';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'level_win', 'level_lose', 'is_forward'], 'integer'],
            [['ratio_deposit', 'ratio_tax', 'balance', 'balance_lock', 'balance_should'], 'number'],
            [['name'], 'string', 'max' => 32],
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
            'user_id' => 'User ID',
            'ratio_deposit' => 'Ratio Deposit',
            'level_win' => 'Level Win',
            'level_lose' => 'Level Lose',
            'ratio_tax' => 'Ratio Tax',
            'balance' => 'Balance',
            'balance_lock' => 'Balance Lock',
            'balance_should' => 'Balance Should',
            'is_forward' => 'Is Forward',
        ];
    }

    /**
     * @inheritdoc
     * @return UserFinanceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserFinanceQuery(get_called_class());
    }
}
