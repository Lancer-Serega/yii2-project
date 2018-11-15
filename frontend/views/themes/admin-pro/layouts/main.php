<?php

/**
 * @var View $this
 * @var string $content
 * @var User $user
 * @var SigninForm $signinFormModel
 */

use frontend\assets\AdminProThemeAsset;
use \frontend\models\User;
use frontend\widgets\Alert;
use \yii\helpers\Html;
use \yii\helpers\Url;
use \yii\web\View;
use \frontend\models\Form\SigninForm;

AdminProThemeAsset::register($this);

?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language; ?>">
<head>
    <meta charset="<?= Yii::$app->charset; ?>">
    <meta name="theme-color" content="#000">
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?= Html::csrfMetaTags(); ?>
    <title><?= Html::encode($this->title); ?></title>
    <link rel="shortcut icon" href="<?= Url::to($this->theme->getUrl('/images/favicon.ico'), true); ?>">
    <?php $this->head(); ?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>


<body class="single-column fix-header card-no-border">

<?php $this->beginBody() ?>

    <?php require_once __DIR__ . '/preloader.php'; ?>

    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">

        <?php require_once __DIR__ . '/header.php'; ?>

        <?php require_once __DIR__ . '/sidebar.php'; ?>

        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">

            <div class="alert-block">
                <?php if (count(Yii::$app->session->getAllFlashes())): ?>
                    <!-- ============================================================== -->
                    <!-- Alerts -->
                    <!-- ============================================================== -->
                    <div class="container-fluid">
                        <?= Alert::widget(['options' => ['class' => 'show']]) . '<br/>'; ?>
                    </div>
                    <!-- ============================================================== -->
                    <!-- END Alerts -->
                    <!-- ============================================================== -->
                <?php endif; ?>
            </div>

            <?= $content; ?>

            <?php require_once __DIR__ . '/footer.php'; ?>

            <?php require_once __DIR__ . '/contents.php'; ?>

        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->

    <?php $this->endBody(); ?>
</body>

</html>
<?php $this->endPage(); ?>
