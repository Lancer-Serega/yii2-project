<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 30.10.18
 * Time: 13:09
 */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('app', 'Request password reset');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-request-password-reset">
    <h1><?= Html::encode($this->title); ?></h1>

    <p>
        <?= Yii::t('app', 'Please fill out your email.'); ?>
        <?= Yii::t('app', 'A link to reset password will be sent there.'); ?>
    </p>

    <div class="row">
        <div class="col-lg-5">

            <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>
            <?= $form->field($model, 'email')->textInput(['autofocus' => true]); ?>
            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Send'), ['class' => 'btn btn-primary']); ?>
            </div>
            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>