<?php

namespace app\modules\m\controllers;

class TradeController extends BaseController
{

    public function actionFutures()
    {
        return $this->render('futures');
    }

    public function actionIndex()
    {
        return $this->redirect(['stock']);
//        return $this->render('index');
    }

    public function actionStock()
    {
        return $this->render('stock');
    }

}
