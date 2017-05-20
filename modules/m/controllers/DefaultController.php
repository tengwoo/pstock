<?php

namespace app\modules\m\controllers;

/**
 * Default controller for the `m` module
 */
class DefaultController extends BaseController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionContact()
    {
        return $this->render('index');
    }
}
