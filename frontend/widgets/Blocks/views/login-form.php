<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 30.10.18
 * Time: 16:35
 */

/**
 * @var LogInForm $loginFormModel
 * @var string $formUrl
 */

use frontend\models\LoginForm;
use yii\widgets\ActiveForm;
use \yii\helpers\Html;

?>
return '
<!-- Popups LogIn:: Start-->
<div class="popup" id="popup-login" style="display: none;">
    <span class="popup__close" data-fancybox-close>
        <svg class="icon-close">
            <use xlink:href="sprites/sprite.svg#icon-close"></use>
        </svg>
    </span>

    <span class="popup__heading">Some text...</span>

    <div class="popup__container">
        <div class="auth">
            <div class="row">
                <div class="col-md-12 pull-md-12">
                    <div class="auth__reg">
                        <div class="ui-form">
                            <?php
                            $form = ActiveForm::begin([
                                'id' => 'login-form',
                                'action' => $formUrl,
                                'options' => [
                                    'id' => 'popup-login',
                                    'class' => 'form-popup-login js-validate',
                                    'data-type' => 'JSON',
                                    'data-content-type' => 'application/json',
                                ],
                            ]);
                            ?>

                            <span class="ui-legend">
                                <?= Yii::t('app', 'Authorization form'); ?>
                            </span>

                            <div class="auth__social">
                                <p class="auth__social-text"><?= Yii::t('app', 'Log In via'); ?></p>
                                <div class="auth__social-control">
                                    <a class="auth__social-btn" href="#">
                                        <span class="icon-social-fb"></span>
                                    </a>
                                    <a class="auth__social-btn" href="#">
                                        <span class="icon-social-tw"></span>
                                    </a>
                                    <a class="auth__social-btn" href="#">
                                        <span class="icon-social-gp"></span>
                                    </a>
                                    <a class="auth__social-btn" href="#">
                                        <span class="icon-social-vk"></span>
                                    </a>
                                </div>
                            </div>

                            <div class="ui-field">
                                <?php $options = ['class' => 'ui-input', 'placeholder' => Yii::t('app', 'Email')]; ?>
                                <?= $form->field($loginFormModel, 'email')->textInput($options); ?>
                            </div>

                            <div class="ui-field">
                                <?php $options = ['class' => 'ui-input', 'placeholder' => Yii::t('app', 'Password')]; ?>
                                <?= $form->field($loginFormModel, 'password')->passwordInput($options); ?>
                            </div>

                            <div class="ui-field">
                                <label class="ui-check">
                                    <?php $options = ['class' => 'ui-check__input']; ?>
                                    <?= $form->field($loginFormModel, 'password')->checkbox($options); ?>
                                    <span class="ui-check__checkbox">
                                        <svg class="icon-check">
                                            <use xlink:href="sprites/sprite.svg#icon-check"></use>
                                        </svg>
                                    </span>
                                    <?= Yii::t('app', 'Remember me'); ?>
                                </label>
                            </div>

                            <?= Html::submitButton(Yii::t('app', 'Login account'), ['class' => 'btn btn--block btn--green']); ?>
                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Popups LogIn:: End-->