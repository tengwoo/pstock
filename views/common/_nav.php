<?php
use \yii\bootstrap\NavBar;
use \yii\bootstrap\Nav;
use \yii\helpers\Html;


NavBar::begin([
    'brandLabel' => Yii::$app->name,
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => '',
    ],
]);

$is_login = !Yii::$app->user->isGuest;
echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'items' => [
        ['label' => '首页', 'url' => ['/site/index']],
        ['label' => '股票操盘', 'url' => ['/hall/stock']],
//        ['label' => '联系', 'url' => ['/site/contact']],
        $is_login ? (
            '<li>'
            . Html::beginForm(['/user/security/logout'], 'post')
            . Html::submitButton(
                '注销 (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>'
        ) : (
        ['label' => '登录', 'url' => ['/user/security/login']]
        ),
        $is_login ? ('') : ['label' => '注册', 'url' => ['/user/registration']],
    ],
]);
NavBar::end();
?>