<?php

namespace frontend\assets;

use yii\web\AssetBundle;
use yii\web\JqueryAsset;
use yii\web\YiiAsset;
use yii\bootstrap\BootstrapAsset;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '/css/critical.min.css',
        '/css/theme.css',
        '/css/app.min.css',
    ];
    public $js = [
        '/js/plugins/plugins.min.js',
        '/js/plugins/jquery.formstyler.js',
        '/js/app.min.js',
    ];
    public $depends = [
        YiiAsset::class,
//        JqueryAsset::class,
        BootstrapAsset::class,
    ];
}
