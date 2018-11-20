<?php
/**
 * Created by PhpStorm.
 * UserEntity: sergey
 * Date: 26.10.18
 * Time: 20:07
 */

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $loginForm \frontend\models\Form\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('form', 'Login account');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p><?= \Yii::t('form', 'Please fill out the following fields to login:'); ?></p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($loginForm, 'email')->textInput(['autofocus' => true]) ?>

                <?= $form->field($loginForm, 'password')->passwordInput() ?>

                <?= $form->field($loginForm, 'remember')->checkbox() ?>

                <div style="color:#999;margin:1em 0">
                    <?= \Yii::t('form', '<?= \Yii::t('form', 'If you forgot your password you can'); ?>'); ?> <?= Html::a(Yii::t('form', 'reset it'), ['site/request-password-reset']) ?>.
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>