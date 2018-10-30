<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 30.10.18
 * Time: 16:35
 */

/**
 * @var SignInForm $signinFormModel
 * @var string $formUrl
 */

use frontend\models\SigninForm;
use yii\widgets\ActiveForm;
use \yii\helpers\Html;

?>
<!-- Popups SignIn:: Start-->
<div class="popup" id="popup-signin" style="display: none;">
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
                                    'id' => 'signin-form',
                                    'action' => $formUrl,
                                    'options' => [
                                        'id' => 'popup-signin',
                                        'class' => 'form-popup-signin js-validate',
                                        'data-type' => 'JSON',
                                        'data-content-type' => 'application/json',
                                    ],
                                ]);
                            ?>

                            <span class="ui-legend">
                                <?= Yii::t('app', 'Registration form'); ?>
                            </span>

                            <div class="ui-field">
                                <?php $options = ['class' => 'ui-input', 'placeholder' => Yii::t('app', 'Your name')]; ?>
                                <?= $form->field($signinFormModel, 'username')->textInput($options); ?>
                            </div>

                            <div class="ui-field">
                                <?php $options = ['class' => 'ui-input', 'placeholder' => Yii::t('app', 'Email')]; ?>
                                <?= $form->field($signinFormModel, 'email')->textInput($options); ?>
                            </div>

                            <div class="ui-field">
                                <?php $options = ['class' => 'ui-input', 'placeholder' => Yii::t('app', 'Password')]; ?>
                                <?= $form->field($signinFormModel, 'password')->passwordInput($options); ?>
                            </div>

                            <div class="ui-field">
                                <?php $options = ['class' => 'ui-input', 'placeholder' => Yii::t('app', 'Password repeat')]; ?>
                                <?= $form->field($signinFormModel, 'password_repeat')->passwordInput($options); ?>
                            </div>

                            <?= Html::submitButton(Yii::t('app', 'Create account'), ['class' => 'btn btn--block btn--green']); ?>
                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Popups SignIn:: End-->