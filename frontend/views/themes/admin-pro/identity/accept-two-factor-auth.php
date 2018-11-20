<?php
/**
 * Created by PhpStorm.
 * UserEntity: sergey
 * Date: 19.11.18
 * Time: 18:08
 */

/* @var View $this */
/* @var ActiveForm $form */
/* @var UserConfigForm $userConfigForm */
/* @var string $twoFactorAuthKey */

use \frontend\components\View;
use \frontend\models\Form\UserConfigForm;
use \frontend\widgets\AlertWidget;
use \yii\helpers\Html;
use \yii\bootstrap\ActiveForm;
use \frontend\widgets\BreadcrumbsWidget;
use yii\helpers\Url;

$this->title = Yii::t('form', 'Login confirmation');
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
             <?= AlertWidget::widget(); ?><br/>
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
            <?= BreadcrumbsWidget::widget([
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

                        <p><?= \Yii::t('form', 'Please fill out the following fields to login:'); ?></p>

                        <div class="row">
                            <div class="col-lg-5">
                                <?php $form = ActiveForm::begin(['id' => 'user-config-form', 'action' => Url::to(['/check-two-factor-auth']), 'method' => 'get']); ?>

                                <?= $form->field($userConfigForm, 'twoFactorAuthKey')
                                    ->textInput(['value' => $twoFactorAuthKey, 'autofocus' => true])
                                    ->label(\Yii::t('form', 'Two factor key'));
                                ?>

                                <div style="color:#999;margin:1em 0">
                                    <?= \Yii::t('form', 'If you for some reason did not receive a letter, then check the spam folder.'); ?>
                                    <br>
                                    <?= Html::a(Yii::t('form', 'Otherwise, you can resend the letter.'), ['/two-factor-auth-key-reset']); ?>
                                </div>

                                <div class="form-group">
                                    <?= Html::submitButton(Yii::t('form', 'Login'), ['class' => 'btn btn-primary', 'name' => 'login-button']); ?>
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
