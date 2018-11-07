<?php

/**
 * @var View $this
 * @var string $content
 * @var User $user
 * @var SigninForm $signinFormModel
 */

use \frontend\models\User;
use \yii\helpers\Html;
use \yii\helpers\Url;
use \yii\web\View;
use \yii\widgets\Breadcrumbs;
use \frontend\models\SigninForm;
use \frontend\widgets\LanguageCheck;
use \frontend\widgets\Blocks\{AccountMenu, HeaderMenu, LogIn, SignIn};
use \frontend\assets\AppAsset;
use \common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language; ?>">
<head>
    <meta charset="<?= Yii::$app->charset; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#000">
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <?= Html::csrfMetaTags(); ?>
    <title><?= Html::encode($this->title); ?></title>
    <link rel="shortcut icon" href="<?= Url::to('/images/favicon.ico', true); ?>">
    <?php $this->head() ?>
</head>

<body class="page-homepage">
<?php $this->beginBody() ?>
<div class="app">
    <!-- Header :: Start-->
    <header class="header compensate-for-scrollbar">
        <div class="container-fluid">
            <div class="logo">
                <a href="<?= Url::to(['/'], true); ?>">
                    <img src="<?= Url::to('/images/logo.png', true); ?>" alt="ProxyServers" />
                </a>
            </div>
            <?= HeaderMenu::widget(['route' => $this->context->route]); ?>
            <?= LanguageCheck::widget(['app' => Yii::$app]); ?>
            <?= AccountMenu::widget(['user' => Yii::$app->getUser()->getIdentity()]); ?>
        </div>
    </header>
    <!-- Header :: End-->

    <?php if (count(Yii::$app->session->getAllFlashes())) {
        echo Alert::widget() . '<br/>';
    } ?>

    <!-- Main :: Start-->
    <main class="main">
        <div id="breadcrumps">
            <div class="container-fluid">
                <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs'] ?? [],]); ?>
            </div>
        </div>

        <?= $content; ?>
    </main>
    <!-- Main :: End-->

    <!-- Footer :: Start-->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-5 col-lg-4 col-xl-4">
                    <div class="logo">
                        <a href="#">
                            <img src="<?= Url::to('/images/logo-grey.png', true); ?>" alt="ProxyServers">
                        </a>
                    </div>
                    <p class="copyright">2018 © ProxyServers<br>Допинформация копирайты</p>
                </div>
                <div class="col-sm-7 col-lg-4 col-xl-5">
                    <nav class="nav-info">
                        <div class="row">
                            <div class="col-7 col-xl-6">
                                <ul class="nav-info__menu">
                                    <li><a class="nav-info__link" href="#">Конфиденциальность</a></li>
                                    <li><a class="nav-info__link" href="#">Сообщить о нарушении</a></li>
                                    <li><a class="nav-info__link" href="#">Правила пользования</a></li>
                                    <li><a class="nav-info__link" href="#">Обратная связь</a></li>
                                </ul>
                            </div>
                            <div class="col-5 col-xl-6">
                                <ul class="nav-info__menu">
                                    <li><a class="nav-info__link" href="#">О нас</a></li>
                                    <li><a class="nav-info__link" href="#">FAQ</a></li>
                                    <li><a class="nav-info__link" href="#">Trial period</a></li>
                                    <li><a class="nav-info__link" href="#">Карта сайта</a></li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
                <div class="col-lg-4 col-xl-3">
                    <div class="payments">
                        <p class="payments__text">Способы оплаты</p>
                        <ul class="payments__list">
                            <li>
                                <svg class="icon-paypal">
                                    <use xlink:href="/sprites/sprite.svg#icon-paypal"></use>
                                </svg>
                            </li>
                            <li>
                                <svg class="icon-visa">
                                    <use xlink:href="/sprites/sprite.svg#icon-visa"></use>
                                </svg>
                            </li>
                            <li>
                                <svg class="icon-mastercard">
                                    <use xlink:href="/sprites/sprite.svg#icon-mastercard"></use>
                                </svg>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer :: End-->

    <!-- Popups widgets :: Start -->
    <?= LogIn::widget(['formUrl' => Url::to(['/login'])]); ?>
    <?= SignIn::widget(['formUrl' => Url::to(['/signin'])]); ?>
    <!-- Popups widgets :: END -->

    <?php $this->endBody(); ?>
</div>
</body>
</html>
<?php $this->endPage(); ?>
