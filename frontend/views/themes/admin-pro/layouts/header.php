<?php
/**
* Created by PhpStorm.
* UserEntity: sergey
* Date: 12.11.18
* Time: 12:48
*/

use \yii\helpers\Url;
use \frontend\widgets\Blocks\LanguageWidget;
use \frontend\widgets\Blocks\SearchWidget;
use \frontend\widgets\Blocks\NotificationWidget;
use \frontend\widgets\Blocks\MegaBlockWidget;
use \frontend\widgets\Blocks\MessageWidget;
use \frontend\widgets\Blocks\ProfileWidget;
?>

<!-- ============================================================== -->
<!-- Topbar header - style you can find in pages.scss -->
<!-- ============================================================== -->
<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">

        <!-- ============================================================== -->
        <!-- Logo -->
        <!-- ============================================================== -->
        <div class="navbar-header">
            <a class="navbar-brand" href="<?= Url::to('/', true); ?>">
                <!-- Logo icon -->
                <b>
                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
<!-- Dark Logo icon -->
                    <img src="<?= Url::to($this->theme->getUrl('/assets/images/logo-icon.png')); ?>" alt="homepage" class="dark-logo"/>
                    <!-- Light Logo icon -->
                    <img src="<?= Url::to($this->theme->getUrl('/assets/images/logo-light-icon.png')); ?>" alt="homepage" class="light-logo"/>
                </b>
                <!--End Logo icon -->
                <!-- Logo text -->
                <span>
                     <!-- dark Logo text -->
                     <img src="<?= Url::to($this->theme->getUrl('/assets/images/logo-text.png')); ?>" alt="homepage" class="dark-logo"/>
                    <!-- Light Logo text -->
                     <img src="<?= Url::to($this->theme->getUrl('/assets/images/logo-light-text.png')); ?>" class="light-logo" alt="homepage"/>
                </span>
            </a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->

        <div class="navbar-collapse">

            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav mr-auto">
                <!-- This is  -->
                <li class="nav-item">
                    <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark" href="javascript:void(0)">
                        <i class="ti-menu"></i>
                    </a>
                </li>
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link sidebartoggler hidden-sm-down waves-effect waves-dark" href="javascript:void(0)">-->
<!--                        <i class="ti-menu"></i>-->
<!--                    </a>-->
<!--                </li>-->
                <li class="nav-item hidden-sm-down"></li>
            </ul>

            <!-- ============================================================== -->
            <!-- UserEntity profile and search -->
            <!-- ============================================================== -->
            <ul class="navbar-nav my-lg-0">
                <li class="nav-item hidden-xs-down search-box">
                    <?= SearchWidget::widget(['search' => '/api/search']); ?>
                </li>

                <li class="nav-item dropdown">
                    <?= NotificationWidget::widget([]); ?>
                </li>

                <li class="nav-item dropdown">
                    <?= MessageWidget::widget([]); ?>
                </li>

                <!-- ============================================================== -->
                <!-- mega menu -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown mega-dropdown">
                    <?= MegaBlockWidget::widget([]); ?>
                </li>
                <!-- ============================================================== -->
                <!-- End mega menu -->
                <!-- ============================================================== -->

                <?= LanguageWidget::widget(); ?>

                <!-- ============================================================== -->
                <!-- Profile -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown">
                    <?= ProfileWidget::widget(); ?>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- ============================================================== -->
<!-- End Topbar header -->
<!-- ============================================================== -->