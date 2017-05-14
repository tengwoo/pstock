<?php
/**
 * Created by PhpStorm.
 * User: cake
 * Date: 2016/11/28
 * Time: 上午1:55
 */

namespace app\extensions;

use yii\widgets\LinkPager;

class MyLinkPager extends LinkPager
{
    public $options = ['class' => 'paginList'];

    public $pageCssClass = 'paginItem';

    public $prevPageCssClass = 'paginItem';
    public $nextPageCssClass = 'paginItem';
}