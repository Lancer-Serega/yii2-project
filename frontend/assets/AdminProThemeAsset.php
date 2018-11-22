<?php

namespace frontend\assets;

use yii\bootstrap\BootstrapAsset;
use yii\web\AssetBundle;
use yii\web\View;
use yii\web\YiiAsset;

/**
 * Main frontend application asset bundle.
 */
class AdminProThemeAsset extends AssetBundle
{
    public $basePath = '@webroot/themes/admin-pro/';
    public $baseUrl = '@web/themes/admin-pro/';

    public $css = [
        'assets/plugins/bootstrap/css/bootstrap.min.css',
        'assets/plugins/bootstrap-switch/bootstrap-switch.min.css',
        'assets/plugins/prism/prism.css',
        'css/pages/floating-label.css',
        'css/colors/blue.css',
        'css/style.css',
    ];

    public $js = [
        'assets/plugins/bootstrap/js/popper.min.js',
        'assets/plugins/bootstrap/js/bootstrap.min.js',
        'assets/plugins/bootstrap-switch/bootstrap-switch.min.js',
        'assets/plugins/sticky-kit-master/dist/sticky-kit.min.js',
        'assets/plugins/sparkline/jquery.sparkline.min.js',
        'assets/plugins/styleswitcher/jQuery.style.switcher.js',
        'js/perfect-scrollbar.jquery.min.js',
        'js/waves.js',
        'js/sidebarmenu.js',
        'js/custom.min.js',
        'js/app.js',
    ];

    public $depends = [
        YiiAsset::class,
    ];

    /**
     * @return void
     */
    public function init(): void
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
