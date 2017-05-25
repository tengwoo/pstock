<?php

namespace app\modules\m\controllers;

use app\models\OrderStockHistory;

class HoldController extends \yii\web\Controller
{
    public function actionFutures()
    {
        return $this->render('futures');
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionStock()
    {
        return $this->render('stock');
    }

    public function actionStockHistory()
    {
        $model = OrderStockHistory::latestByUser(\Yii::$app->user->identity->getId());
        return $this->render('stock_history', [
            'model' => $model,
        ]);
    }

}
