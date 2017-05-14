<?php
/**
 * Created by PhpStorm.
 * User: cake
 * Date: 2016/11/30
 * Time: 上午9:48
 */

namespace app\extensions;


use yii\grid\GridView;

class MyGridView extends GridView
{
    public $tableOptions = ['class' => 'tablelist odd-enabled', ];

    public $layout = "{items}\n<div class=\"pagin\">{summary}\n{pager}</div>";

    public $pager = ['class' => 'app\extensions\MyLinkPager',];

//    public $summary = false;
    public $summaryOptions = ['class' => 'message'];
}