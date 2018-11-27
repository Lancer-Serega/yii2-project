<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\Form\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('form', 'Request password reset');
?>
<div class="container-fluid">
    <div class="site-request-password-reset">
        <h1><?= Html::encode($this->title); ?></h1>

        <p><?= Yii::t('form', 'Please fill out your email.'); ?></p>
        <p><?= Yii::t('form', 'A link to reset password will be sent there.'); ?></p>

        <div class="row">
            <div class="col-lg-5">
                <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

                    <?= $form->field($model, 'email')->textInput(['autofocus' => true, 'class' => 'ui-input form-control']); ?>

                    <div class="form-group">
                        <?= Html::submitButton(Yii::t('form', 'Send'), ['class' => 'btn btn-primary btn--36']); ?>
                    </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
