<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 19.11.18
 * Time: 18:08
 */

/* @var View $this */
/* @var ActiveForm $form */
/* @var UserConfigForm $userConfigForm */
/* @var string $twoFactorAuthKey */

use frontend\components\View;
use \frontend\models\Form\UserConfigForm;
use \frontend\widgets\Alert;
use \yii\helpers\Html;
use \yii\bootstrap\ActiveForm;
use \yii\widgets\Breadcrumbs;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <?php if (count(Yii::$app->session->getAllFlashes())): ?>
        <!-- ============================================================== -->
        <!-- Alerts -->
        <!-- ============================================================== -->
        <div class="alert-block">
             <?= Alert::widget(); ?><br/>
        </div>
        <!-- ============================================================== -->
        <!-- END Alerts -->
        <!-- ============================================================== -->
    <?php endif; ?>
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor"><?= Yii::t('menu', 'Security'); ?></h3>
        </div>
        <div class="col-md-7 align-self-center">
            <?= Breadcrumbs::widget([
                'activeItemTemplate' => "<li class=\"breadcrumb-item\"><i>{link}</i></li>\n",
                'itemTemplate' => "<li class=\"breadcrumb-item\"><i>{link}</i></li>\n",
                'links' => $this->params['breadcrumbs'] ?? [],
            ]);
            ?>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="identity-accept-two-factor-auth">
                        <h1><?= Html::encode($this->title); ?></h1>

                        <p>Please fill out the following fields to login:</p>

                        <div class="row">
                            <div class="col-lg-5">
                                <?php $form = ActiveForm::begin(['id' => 'user-config-form']); ?>

                                <?= $form->field($userConfigForm, 'twoFactorAuthKey')->textInput(['value' => $twoFactorAuthKey, 'autofocus' => true]); ?>

                                <div style="color:#999;margin:1em 0">
                                    If you forgot your password you can <?= Html::a(Yii::t('form', 'reset it'), ['site/request-password-reset']); ?>.
                                </div>

                                <div class="form-group">
                                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']); ?>
                                </div>

                                <?php ActiveForm::end(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
