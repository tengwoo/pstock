<?php

namespace app\modules\m\controllers;

class TradeController extends \yii\web\Controller
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

}
