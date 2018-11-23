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
?>

<div class="auth">
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

        <div class="row">
            <div class="col-md-12 pull-md-12">
                <div class="auth__reg">
                    <h1><?= Html::encode($this->title); ?></h1>

                    <div class="ui-form">
                        <?php $form = ActiveForm::begin(['id' => 'user-config-form', 'action' => Url::to(['/check-two-factor-auth']), 'method' => 'get']); ?>

                        <?= $form->field($userConfigForm, 'twoFactorAuthKey')
                            ->textInput(['class' => 'ui-input', 'value' => $twoFactorAuthKey, 'autofocus' => true])
                            ->label(\Yii::t('form', 'Two factor key'));
                        ?>

                        <div style="color:#999;margin:1em 0">
                            <?= \Yii::t('form', 'If you for some reason did not receive a letter, then check the spam folder.'); ?>
                            <br>
                            <?= Html::a(Yii::t('form', 'Otherwise, you can resend the letter.'), ['/two-factor-auth-key-reset']); ?>
                        </div>

                        <div class="form-group">
                            <?= Html::submitButton(Yii::t('form', 'Login'), ['class' => 'btn btn-primary btn--green-empty btn--36', 'name' => 'login-button']); ?>
                        </div>

                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
