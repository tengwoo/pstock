<?php

namespace app\modules\m\controllers;

use app\models\Stock;
use app\modules\m\models\StockInfoForm;
use app\models\StockQuery;
use app\models\StockSearch;
use yii\base\ErrorException;
use yii\base\Exception;
use yii\web\Response;

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
        $model = Stock::oneStock(\Yii::$app->request->get('code'));

        return $this->render('stock', [
            'model' => $model,
        ]);
    }

    public function actionGetStock(){
        \Yii::$app->response->format = Response::FORMAT_JSON;

        $model = new StockInfoForm();
        if($model->load(\Yii::$app->request->post(), '') && $model->getData()){
            return $model->getData();
        }else{
            throw new ErrorException('股票查询暂不可用！');
        }

    }

    public function actionSearchStock(){
        \Yii::$app->response->format = Response::FORMAT_JSON;

        $model = new StockSearch();
        $result = null;

        try{
            $stock_sn = \Yii::$app->request->post('stock_sn');
            if(preg_match('/[^\d]/i', $stock_sn, $match)){
                throw new Exception('错误的股票代码!', 501);
            }

            $result = $model->mobileCompletionSearch(['code' => $stock_sn]);
        }catch (Exception $e){
            throw new ErrorException('股票查询暂不可用！ 错误代码'.$e->getCode());
        }

        return $result;
    }

}
