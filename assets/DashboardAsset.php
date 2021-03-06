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
 * @author afquinterog
 * @since 2.0
 */
class DashboardAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        // Core
        'css/bootstrap.min.css',
        'css/bootstrap-extend.min.css',
        'css/site.min.css',
        'css/login-v3.css',

        // Plugins
        'js/vendor/animsition/animsition.css',
        'js/vendor/asscrollable/asScrollable.css',
        'js/vendor/switchery/switchery.css',
        'js/vendor/intro-js/introjs.css',
        'js/vendor/slidepanel/slidePanel.css',
        'js/vendor/flag-icon-css/flag-icon.css',

        // Fonts
        'css/fonts/web-icons/web-icons.min.css',
        'css/fonts/brand-icons/brand-icons.min.css',
        'http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'
    ];
    public $js = [
        'js/vendor/modernizr/modernizr.js',
        'js/vendor/breakpoints/breakpoints.js',
    ];
    public $jsOptions = [
       'position' => View::POS_HEAD
    ];
    public $depends = [
        'yii\web\YiiAsset'
    ];
}
