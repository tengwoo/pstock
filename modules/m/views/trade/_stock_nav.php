<?php

/**
 * @param $nav_sub_index;
 */

use yii\bootstrap\Nav;
?>

<?= Nav::widget([
    'options' => ['class' => 'nav-tabs nav-sub'],
    'items' => [
        ['label' => '股票操盘', 'url' => ['/m/trade/stock'], 'active' => $nav_sub_index == 1, 'options' => ['role' => 'presentation'],],
        ['label' => '持仓', 'url' => ['/m/hold/stock'], 'active' => $nav_sub_index == 2, 'options' => ['role' => 'presentation'],],
        ['label' => '结算', 'url' => ['/m/hold/stock-history'], 'active' => $nav_sub_index == 3, 'options' => ['role' => 'presentation'],],
    ],
])
?>

