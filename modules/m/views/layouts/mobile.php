<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use app\assets\MobileAppAsset;

MobileAppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <div class="navbar navbar-default page-title">
        <?= $this->title ?: Yii::$app->name ?>
    </div>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer navbar navbar-default navbar-fixed-bottom">
    <div class="container">
        <div class="row">
            <div class="col-xs-3 col-sm-3 footer-nav-item active" data-role="default/index">
                <a href="<?= Url::to(['/m/default/index']) ?>"><em class="glyphicon glyphicon-home"></em>
                    <span>首页</span></a></div>
            <div class="col-xs-3 col-sm-3 footer-nav-item" data-role="trade">
                <a href="<?= Url::to(['/m/trade/stock']) ?>"><em class="glyphicon glyphicon-star"></em>
                    <span>交易</span></a></div>
            <div class="col-xs-3 col-sm-3 footer-nav-item" data-role="contact">
                <a href="<?= Url::to(['/m/default/contact']) ?>"><em class="glyphicon glyphicon-question-sign"></em>
                    <span>咨询</span></a></div>
            <div class="col-xs-3 col-sm-3 footer-nav-item" data-role="user">
                <a href="<?= Url::to(['/user/profile/']) ?>"><em class="glyphicon glyphicon-user"></em>
                    <span>我</span></a></div>
        </div>

        <script>
            (function(){
                var r = '<?= $this->context->getRoute() ?>';
                $('.footer-nav-item').each(function(){
                    if( r.indexOf($(this).attr('data-role')) > -1 ) {
                        $(this).addClass('active').siblings().removeClass('active');
                        return false;
                    }
                });
            })();
        </script>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
