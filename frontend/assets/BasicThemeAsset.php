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
 *
 * Class BasicThemeAsset
 * @package frontend\assets
 */
class BasicThemeAsset extends AssetBundle
{
    public $basePath = '@webroot';

    public $baseUrl = '@web';

    public $css = [
        'themes/basic/css/critical.min.css',
        'themes/basic/css/theme.css',
        'themes/basic/css/app.min.css',
    ];

    public $js = [
        'themes/basic/js/plugins.min.js',
        'themes/basic/js/app.min.js',
    ];

    public $depends = [
        YiiAsset::class,
        JqueryAsset::class,
        BootstrapAsset::class,
        BootstrapThemeAsset::class,
        BootstrapPluginAsset::class,
        BootstrapToggleAsset::class,
    ];
}
