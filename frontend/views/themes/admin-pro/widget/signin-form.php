<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 12.11.18
 * Time: 15:32
 */

/**
 * @var SigninForm $signinFormModel
 * @var string $formUrl
 */

use \frontend\models\SigninForm;
use \yii\widgets\ActiveForm;
use \yii\helpers\Html;
?>

<!-- ============================================================== -->
<!-- Signin Modal wrapper  -->
<!-- ============================================================== -->
<div class="modal fade bs-modal-signin" role="dialog" aria-labelledby="modalSignin">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalSignin"><?= Yii::t('form', 'Registration form'); ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="signin-register" style="background-image:url(../assets/images/background/signin-register.jpg);">
                    <div class="signin-box">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="alert-block"></div>

                                        <?php $form = ActiveForm::begin([
                                            'id' => 'signin-form',
                                            'action' => $formUrl,
                                            'options' => [
                                                'id' => 'signin-form',
                                                'class' => 'form-material floating-labels form-control-line',
                                                'data-type' => 'JSON',
                                                'data-content-type' => 'application/json',
                                            ],
                                        ]); ?>

                                        <div class="">
                                            <?php $options = ['class' => 'form-control', 'autocomplete' => 'username']; ?>
                                            <?= $form->field($signinFormModel, 'username')->textInput($options)->label(Yii::t('form', 'Your name')); ?>
                                        </div>

                                        <div class="">
                                            <?php $options = ['class' => 'form-control', 'autocomplete' => 'email']; ?>
                                            <?= $form->field($signinFormModel, 'email')->textInput($options)->label(Yii::t('form', 'Email')); ?>
                                        </div>

                                        <div class="">
                                            <?php $options = ['class' => 'form-control', 'autocomplete' => 'password']; ?>
                                            <?= $form->field($signinFormModel, 'password')->passwordInput($options)->label(Yii::t('form', 'Password')); ?>
                                        </div>

                                        <div class="">
                                            <?php $options = ['class' => 'form-control', 'autocomplete' => 'password_repeat']; ?>
                                            <?= $form->field($signinFormModel, 'password_repeat')->passwordInput($options)->label(Yii::t('form', 'Password repeat')); ?>
                                        </div>

                                        <?= Html::submitButton(Yii::t('form', 'Create account'), ['class' => 'btn btn--block btn--green']); ?>
                                        <?php ActiveForm::end(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- ============================================================== -->
<!-- END Signin Modal wrapper  -->
<!-- ============================================================== -->