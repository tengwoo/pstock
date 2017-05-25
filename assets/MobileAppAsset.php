<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class MobileAppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css',
        'css/mobile.css',
    ];
    public $js = [
        ['js/jquery.js', 'position' => View::POS_HEAD],
        ['https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js', 'position' => View::POS_HEAD],
    ];
    public $depends = [
//        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}
