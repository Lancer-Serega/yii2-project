<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 26.10.18
 * Time: 20:09
 */

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\Entity\SigninForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signin';
$this->params['breadcrumbs'][] = $this->title;
?>



<div class="site-signin">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signin:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'signin-form']); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'email') ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <div class="form-group">
                <?= Html::submitButton('Signin', ['class' => 'btn btn-primary', 'name' => 'signin-form-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>