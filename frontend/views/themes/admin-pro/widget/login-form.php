<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 12.11.18
 * Time: 15:32
 */

/**
 * @var LoginForm $loginFormModel
 * @var string $formUrl
 */

use frontend\models\LoginForm;
use \yii\widgets\ActiveForm;
use \yii\helpers\Html;
?>

<!-- ============================================================== -->
<!-- Login Modal wrapper  -->
<!-- ============================================================== -->
<div class="modal fade bs-modal-login" role="dialog" aria-labelledby="modalLogin">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalLogin">Login modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <?php $form = ActiveForm::begin([
                            'id' => 'login-form',
                            'action' => $formUrl,
                            'options' => [
                                'id' => 'login-form',
                                'class' => 'form-material floating-labels form-control-line',
                                'data-type' => 'JSON',
                                'data-content-type' => 'application/json',
                            ],
                        ]); ?>

                        <?php $options = ['class' => 'form-control', 'autocomplete' => 'email']; ?>
                        <?= $form->field($loginFormModel, 'email')->textInput($options)->label(Yii::t('form', 'Email')); ?>

                        <?php $options = ['class' => 'form-control', 'autocomplete' => 'password']; ?>
                        <?= $form->field($loginFormModel, 'password')->passwordInput($options)->label(Yii::t('form', 'Password')); ?>

                        <?php $options = ['class' => 'form-control']; ?>
                        <?= $form->field($loginFormModel, 'remember')->checkbox($options)->label(Yii::t('form', 'Remember me')); ?>

                        <?= Html::submitButton(Yii::t('form', 'Login account'), ['class' => 'btn btn--block btn--green']); ?>
                        <?php ActiveForm::end(); ?>
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
<!-- END Login Modal wrapper  -->
<!-- ============================================================== -->

