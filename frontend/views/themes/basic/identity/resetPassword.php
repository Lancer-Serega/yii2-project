<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\Form\ResetPasswordForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Reset password';
?>

<div class="container-fluid">
    <div class="site-reset-password">
        <h1><?= Html::encode($this->title); ?></h1>

        <p><?= \Yii::t('form', 'Please choose your new password') . ':'; ?></p>

        <div class="row">
            <div class="col-lg-5">
                <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>

                    <?= $form->field($model, 'new_password')
                        ->passwordInput(['class' => 'ui-input form-control', 'autofocus' => true])
                        ->label(\Yii::t('form', 'New password')); ?>

                    <?= $form->field($model, 'password_repeat')
                        ->passwordInput(['class' => 'ui-input form-control', 'autofocus' => true])
                        ->label(\Yii::t('form', 'Password repeat')); ?>

                    <div class="form-group">
                        <?= Html::submitButton(Yii::t('form', 'Save'), ['class' => 'btn btn-primary btn--36']); ?>
                    </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
