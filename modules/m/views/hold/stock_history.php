<?php
/* @var $this yii\web\View */

$this->title = '股票结算';
$nav_sub_index = 3;
?>
<?= $this->render('/trade/_stock_nav', ['nav_sub_index' => $nav_sub_index]) ?>

<?php if($model): foreach($model as $i => $order):?>


<?php endforeach;endif;?>
