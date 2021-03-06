<?php
/**
 * Created by PhpStorm.
 * UserEntity: sergey
 * Date: 30.10.18
 * Time: 16:35
 */

/**
 * @var LogInForm $loginFormModel
 * @var string $formUrl
 */

use frontend\models\Form\LoginForm;
use yii\widgets\ActiveForm;
use \yii\helpers\Html;
use \yii\helpers\Url;

?>

<!-- Popups LogIn:: Start-->
<div class="popup" id="popup-login" style="display: none;">
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
                            <?php $form = ActiveForm::begin([
                                'id' => 'login-form',
                                'action' => $formUrl,
                                'options' => [
                                    'id' => 'popup-login',
                                    'class' => 'form-popup-login js-validate',
                                    'data-type' => 'JSON',
                                    'data-content-type' => 'application/json',
                                ],
                            ]); ?>

                            <span class="ui-legend">
                                <?= Yii::t('form', 'Authorization form'); ?>
                            </span>

<!--                            <div class="auth__social">-->
<!--                                <p class="auth__social-text">--><?php // echo Yii::t('form', 'Log In via'); ?><!--</p>-->
<!--                                <div class="auth__social-control">-->
<!--                                    <a class="auth__social-btn" href="#">-->
<!--                                        <span class="icon-social-fb"></span>-->
<!--                                    </a>-->
<!--                                    <a class="auth__social-btn" href="#">-->
<!--                                        <span class="icon-social-tw"></span>-->
<!--                                    </a>-->
<!--                                    <a class="auth__social-btn" href="#">-->
<!--                                        <span class="icon-social-gp"></span>-->
<!--                                    </a>-->
<!--                                    <a class="auth__social-btn" href="#">-->
<!--                                        <span class="icon-social-vk"></span>-->
<!--                                    </a>-->
<!--                                </div>-->
<!--                            </div>-->

                            <div class="ui-field">
                                <?php $options = ['class' => 'ui-input form-control', 'placeholder' => Yii::t('form', 'Email'), 'autocomplete' => 'email']; ?>
                                <?= $form->field($loginFormModel, 'email')->textInput($options)->label(Yii::t('form', 'Email')); ?>
                            </div>

                            <div class="ui-field">
                                <?php $options = ['class' => 'ui-input form-control', 'placeholder' => Yii::t('form', 'Password'), 'autocomplete' => 'password']; ?>
                                <?= $form->field($loginFormModel, 'password')->passwordInput($options)->label(Yii::t('form', 'Password')); ?>
                            </div>

                            <div class="ui-field">
                                <label class="ui-check">
                                    <label class="control-label" for="loginform-remember">
                                        <?= Yii::t('form', 'Remember me'); ?>
                                    </label>
                                    <input type="hidden" name="LoginForm[remember]" value="0">
                                    <label>
                                        <input type="checkbox" id="loginform-remember"
                                               class="ui-check__input form-control" name="LoginForm[remember]"
                                               value="1" checked="" aria-invalid="false">
                                        <span class="ui-check__checkbox">
                                            <svg class="icon-check">
                                                <use xlink:href="http://socksforce.local/themes/basic/sprites/sprite.svg#icon-check"></use>
                                            </svg>
                                        </span>
                                    </label>
                                    <div class="help-block"></div>
                                </label>
                                <span class="float-right">
                                    <a href="<?= Url::to('identity/request-password-reset')?>"><?= Yii::t('form', 'Restore password');?></a>
                                </span>
                            </div>

                            <?= Html::submitButton(Yii::t('form', 'Login account'), ['class' => 'btn btn--block btn--green btn--36']); ?>
                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Popups LogIn:: End-->
