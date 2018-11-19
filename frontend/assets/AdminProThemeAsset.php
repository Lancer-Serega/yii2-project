<?php

namespace frontend\assets;

use lo\widgets\ToggleAsset as BootstrapToggleAsset;
use yii\bootstrap\BootstrapAsset;
use yii\bootstrap\BootstrapThemeAsset;
use yii\web\AssetBundle;
use yii\web\JqueryAsset;
use yii\web\View;
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
        '/themes/admin-pro/assets/plugins/bootstrap/css/bootstrap.min.css',
        '/themes/admin-pro/assets/plugins/bootstrap-switch/bootstrap-switch.min.css',
        '/themes/admin-pro/assets/plugins/prism/prism.css',
        '/themes/admin-pro/css/pages/floating-label.css',
        '/themes/admin-pro/css/colors/blue.css',
        '/themes/admin-pro/css/style.css',
    ];

    public $js = [
        '/themes/admin-pro/assets/plugins/bootstrap/js/popper.min.js',
        '/themes/admin-pro/assets/plugins/bootstrap/js/bootstrap.min.js',
        '/themes/admin-pro/assets/plugins/bootstrap-switch/bootstrap-switch.min.js',
        '/themes/admin-pro/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js',
        '/themes/admin-pro/assets/plugins/sparkline/jquery.sparkline.min.js',
        '/themes/admin-pro/assets/plugins/styleswitcher/jQuery.style.switcher.js',
        '/themes/admin-pro/js/perfect-scrollbar.jquery.min.js',
        '/themes/admin-pro/js/waves.js',
        '/themes/admin-pro/js/sidebarmenu.js',
        '/themes/admin-pro/js/custom.min.js',
        '/themes/admin-pro/js/app.js',
    ];

    public $depends = [
        YiiAsset::class,
    ];

    public function init()
    {
        parent::init();

        \Yii::$app->view->on(View::EVENT_AFTER_RENDER, function () {
            unset(
                \Yii::$app->view->assetBundles[BootstrapAsset::class]
            );
        });

        \Yii::$app->view->on(View::EVENT_BEGIN_BODY, function (){
            unset(
                \Yii::$app->view->assetBundles[BootstrapAsset::class]
            );
        });
    }
}
