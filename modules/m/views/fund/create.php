<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\FundLog */

$this->title = 'Create Fund Log';
$this->params['breadcrumbs'][] = ['label' => 'Fund Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fund-log-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
