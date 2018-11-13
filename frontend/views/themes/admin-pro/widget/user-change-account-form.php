<!-- Form UserChangeAccount:: Start-->
<?php

/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 07.11.18
 * Time: 14:00
 */

use \frontend\models\User;
use \frontend\models\UserChangeAccountForm;
use \yii\web\View;
use \yii\widgets\ActiveForm;
use \yii\helpers\Html;

/**
 * @var View $this
 * @var UserChangeAccountForm $userChangeAccountForm
 * @var string $formUrl
 * @var array $langList
 * @var User $user
 */

$form = ActiveForm::begin([
    'id' => 'user-change-account-form',
    'action' => $formUrl,
    'options' => [
        'id' => 'user-change-account',
        'class' => 'form-material floating-labels form-user-change-account',
        'method' => 'post',
        'data-type' => 'JSON',
        'data-content-type' => 'application/json',
    ],
]);
$user = Yii::$app->user->getIdentity();

// Username
$options = [
    'value' => $user->username,
    'class' => 'form-control',
    'autocomplete' => 'username',
];
$field['username'] = $form->field($userChangeAccountForm, 'username')
    ->textInput($options)
    ->label(Yii::t('form', 'Your name'));

// New password
$options = [
    'class' => 'form-control',
    'autocomplete' => 'new_password',
];
$field['new_password'] = $form->field($userChangeAccountForm, 'new_password')
    ->passwordInput($options)
    ->label(Yii::t('form', 'New password'));

// Password repeat
$options = [
    'class' => 'form-control',
    'autocomplete' => 'password_repeat',
];
$field['password_repeat'] = $form->field($userChangeAccountForm, 'password_repeat')
    ->passwordInput($options)
    ->label(Yii::t('form', 'Password repeat'));

// Interface language
$options = ['class' => 'form-control'];
$field['lang'] = $form->field($userChangeAccountForm, 'language')
    ->dropDownList($langList, $options)
    ->label(Yii::t('form', 'Interface language'));

// Your phone
$options = [
    'value' => $user->phone,
    'class' => 'form-control',
    'autocomplete' => 'phone',
];
$field['phone'] = $form->field($userChangeAccountForm, 'phone')
    ->textInput($options)
    ->label(Yii::t('form', 'Your phone'));

// Your skype
$options = [
    'value' => $user->skype,
    'class' => 'form-control',
    'autocomplete' => 'skype',
];
$field['skype'] = $form->field($userChangeAccountForm, 'skype')
    ->textInput($options)
    ->label(Yii::t('form', 'Your skype'));

// Your telegram
$options = [
    'value' => $user->telegram,
    'class' => 'form-control',
    'autocomplete' => 'telegram',
];
$field['telegram'] = $form->field($userChangeAccountForm, 'telegram')
    ->textInput($options)
    ->label(Yii::t('form', 'Your telegram'));
?>

<div class="vtabs">
    <ul class="nav nav-tabs tabs-vertical" role="tablist">
        <li class="nav-item">
            <a class="nav-link active show" data-toggle="tab" href="#settings-base" role="tab" aria-selected="true">
                <span class="hidden-sm-up">
                    <i class="ti-home"></i>
                </span>
                <span class="hidden-xs-down"><?= Yii::t('content', 'Basic'); ?></span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#settings-notifications" role="tab" aria-selected="false">
                <span class="hidden-sm-up">
                    <i class="ti-user"></i>
                </span>
                <span class="hidden-xs-down"><?= Yii::t('content', 'Notifications'); ?></span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#settings-empty" role="tab" aria-selected="false">
                <span class="hidden-sm-up">
                    <i class="ti-email"></i>
                </span>
                <span class="hidden-xs-down">Empty tab</span>
            </a>
        </li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active show" id="settings-base" role="tabpanel">
            <div class="ui-field"><?= $field['username']; ?></div>
            <div class="ui-field"><?= $field['new_password']; ?></div>
            <div class="ui-field"><?= $field['password_repeat']; ?></div>
            <div class="ui-field"><?= $field['lang']; ?></div>
            <div class="ui-field"><?= $field['phone']; ?></div>
            <div class="ui-field"><?= $field['skype']; ?></div>
            <div class="ui-field"><?= $field['telegram']; ?></div>
        </div>
        <div class="tab-pane p-20" id="settings-notifications" role="tabpanel"></div>
        <div class="tab-pane p-20" id="#settings-empty" role="tabpanel"><h2>Empty tab content!</h2></div>
    </div>
</div>

<?= Html::submitButton(Yii::t('form', 'Save'), ['class' => 'btn btn--block btn--green', 'style' => 'max-width:180px; margin:auto']); ?>

<?php ActiveForm::end(); ?>
<!-- Form UserChangeAccount:: End-->