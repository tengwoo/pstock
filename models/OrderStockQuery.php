<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[OrderStock]].
 *
 * @see OrderStock
 */
class OrderStockQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return OrderStock[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return OrderStock|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
