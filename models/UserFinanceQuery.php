<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[UserFinance]].
 *
 * @see UserFinance
 */
class UserFinanceQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return UserFinance[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return UserFinance|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
