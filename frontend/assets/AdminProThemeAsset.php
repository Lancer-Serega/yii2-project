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
        '/themes/admin-pro/assets/plugins/bootstrap/css/bootstrap.min.css',
        '/themes/admin-pro/assets/plugins/prism/prism.css',
        '/themes/admin-pro/css/style.css',
        '/themes/admin-pro/css/colors/blue.css',
        '/themes/admin-pro/css/pages/floating-label.css',
    ];

    public $js = [
        '/themes/admin-pro/assets/plugins/jquery/jquery.min.js',
        // <!-- Bootstrap tether Core JavaScript -->,
        '/themes/admin-pro/assets/plugins/bootstrap/js/popper.min.js',
        '/themes/admin-pro/assets/plugins/bootstrap/js/bootstrap.min.js',
        // <!-- slimscrollbar scrollbar JavaScript -->,
        '/themes/admin-pro/js/perfect-scrollbar.jquery.min.js',
        // <!--Wave Effects -->,
        '/themes/admin-pro/js/waves.js',
        // <!--Menu sidebar -->,
        '/themes/admin-pro/js/sidebarmenu.js',
        // <!--stickey kit -->,
        '/themes/admin-pro/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js',
        '/themes/admin-pro/assets/plugins/sparkline/jquery.sparkline.min.js',
        // <!--Custom JavaScript -->,
        '/themes/admin-pro/js/custom.min.js',
        // <!-- Style switcher -->,
        '/themes/admin-pro/assets/plugins/styleswitcher/jQuery.style.switcher.js',
        '/themes/admin-pro/js/app.js',
    ];

    public $depends = [
        YiiAsset::class,
    ];
}
