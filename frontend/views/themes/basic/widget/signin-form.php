<?php
/**
 * Created by PhpStorm.
 * UserEntity: sergey
 * Date: 30.10.18
 * Time: 16:35
 */

/**
 * @var SignInForm $signinFormModel
 * @var string $formUrl
 */

use frontend\models\Form\SigninForm;
use yii\widgets\ActiveForm;
use \yii\helpers\Html;

?>
<!-- Popups SignIn:: Start-->
<div class="popup" id="popup-signin" style="display: none;">
    <span class="popup__close" data-fancybox-close>
        <svg class="icon-close">
            <use xlink:href="<?= $this->theme->getUrl('/sprites/sprite.svg#icon-close'); ?>"></use>
        </svg>
    </span>

    <div class="popup__heading">
        <div class="alert-block" style="font-size:15px"></div>
    </div>

    <div class="popup__container">
        <div class="auth">
            <div class="row">
                <div class="col-md-12 pull-md-12">
                    <div class="auth__reg">
                        <div class="ui-form">
                            <?php
                                $form = ActiveForm::begin([
                                    'id' => 'signin-form',
                                    'action' => $formUrl,
                                    'options' => [
                                        'id' => 'popup-signin',
                                        'class' => 'form-popup-signin js-validate fz-20',
                                        'data-type' => 'JSON',
                                        'data-content-type' => 'application/json',
                                    ],
                                ]);
                            ?>

                            <span class="ui-legend">
                                <?= Yii::t('form', 'Registration form'); ?>
                            </span>

                            <div class="ui-field">
                                <?php $options = ['class' => 'ui-input form-control', 'placeholder' => Yii::t('form', 'Your name'), 'autocomplete' => 'username']; ?>
                                <?= $form->field($signinFormModel, 'username')->textInput($options)->label(Yii::t('form', 'Your name')); ?>
                            </div>

                            <div class="ui-field">
                                <?php $options = ['class' => 'ui-input form-control', 'placeholder' => Yii::t('form', 'Email'), 'autocomplete' => 'email']; ?>
                                <?= $form->field($signinFormModel, 'email')->textInput($options)->label(Yii::t('form', 'Email')); ?>
                            </div>

                            <div class="ui-field">
                                <?php $options = ['class' => 'ui-input form-control', 'placeholder' => Yii::t('form', 'Password'), 'autocomplete' => 'password']; ?>
                                <?= $form->field($signinFormModel, 'password')->passwordInput($options)->label(Yii::t('form', 'Password')); ?>
                            </div>

                            <div class="ui-field">
                                <?php $options = ['class' => 'ui-input form-control', 'placeholder' => Yii::t('form', 'Password repeat'), 'autocomplete' => 'password_repeat']; ?>
                                <?= $form->field($signinFormModel, 'password_repeat')->passwordInput($options)->label(Yii::t('form', 'Password repeat')); ?>
                            </div>

                            <?= Html::submitButton(Yii::t('form', 'Create account'), ['class' => 'btn btn--block btn--green fz-20']); ?>
                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Popups SignIn:: End-->