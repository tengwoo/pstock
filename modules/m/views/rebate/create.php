<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Rebate */

$this->title = 'Create Rebate';
$this->params['breadcrumbs'][] = ['label' => 'Rebates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rebate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
