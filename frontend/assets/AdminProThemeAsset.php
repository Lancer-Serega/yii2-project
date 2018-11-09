<?php

namespace frontend\assets;

use lo\widgets\ToggleAsset as BootstrapToggleAsset;
use yii\bootstrap\BootstrapAsset;
use yii\bootstrap\BootstrapThemeAsset;
use yii\web\AssetBundle;
use yii\web\JqueryAsset;
use yii\web\YiiAsset;
use yii\bootstrap\BootstrapPluginAsset;

/**
 * Main frontend application asset bundle.
 */
class AdminProThemeAsset extends AssetBundle
{
    public $basePath = '@webroot/themes/admin-pro';
    public $baseUrl = '@web/themes/admin-pro';
    public $css = [
//        '/css/app.min.css',
    ];
    public $js = [
//        '/js/plugins.min.js',
    ];
    public $depends = [
        YiiAsset::class,
    ];
}
