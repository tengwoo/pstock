<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[FundLog]].
 *
 * @see FundLog
 */
class FundLogQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return FundLog[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return FundLog|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
