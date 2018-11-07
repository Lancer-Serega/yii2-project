<!-- Form UserChangeAccount:: Start-->
<?php

/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 07.11.18
 * Time: 14:00
 */

use \frontend\models\User;
use \frontend\models\userChangeAccountFormModel;
use \yii\web\View;
use \yii\widgets\ActiveForm;
use \yii\helpers\Html;

/**
 * @var View $this
 * @var userChangeAccountFormModel $userChangeAccountFormModel
 * @var string $formUrl
 * @var array $langList
 * @var User $user
 */

$form = ActiveForm::begin([
    'id' => 'user-change-account-form',
    'action' => $formUrl,
    'options' => [
        'id' => 'user-change-account',
        'class' => 'form-user-change-account js-validate',
        'method' => 'post',
        'data-type' => 'JSON',
        'data-content-type' => 'application/json',
    ],
]);
$user = Yii::$app->user->getIdentity();

// Username
$options = [
    'value' => $user->username,
    'class' => 'ui-input',
    'placeholder' => Yii::t('form', 'Your name'),
    'autocomplete' => 'username',
];
$field['username'] = $form->field($userChangeAccountFormModel, 'username')
    ->textInput($options)
    ->label(Yii::t('form', 'Your name'));

// New password
$options = [
    'class' => 'ui-input',
    'placeholder' => Yii::t('form', 'New password'),
    'autocomplete' => 'new_password',
];
$field['new_password'] = $form->field($userChangeAccountFormModel, 'new_password')
    ->passwordInput($options)
    ->label(Yii::t('form', 'New password'));

// Password repeat
$options = [
    'class' => 'ui-input',
    'placeholder' => Yii::t('form', 'Password repeat'),
    'autocomplete' => 'password_repeat',
];
$field['password_repeat'] = $form->field($userChangeAccountFormModel, 'password_repeat')
    ->passwordInput($options)
    ->label(Yii::t('form', 'Password repeat'));

// Interface language
$options = ['class' => 'ui-select'];
$field['lang'] = $form->field($userChangeAccountFormModel, 'lang')
    ->dropDownList($langList, $options)
    ->label(Yii::t('form', 'Interface language'));

// Your phone
$options = [
    'class' => 'ui-input',
    'placeholder' => Yii::t('form', 'Your phone'),
    'autocomplete' => 'phone',
];
$field['phone'] = $form->field($userChangeAccountFormModel, 'phone')
    ->textInput($options)
    ->label(Yii::t('form', 'Your phone'));

// Your skype
$options = [
    'value' => $user->skype,
    'class' => 'ui-input',
    'placeholder' => Yii::t('form', 'Your skype'),
    'autocomplete' => 'skype',
];
$field['skype'] = $form->field($userChangeAccountFormModel, 'skype')
    ->textInput($options)
    ->label(Yii::t('form', 'Your skype'));

// Your telegram
$options = [
    'value' => $user->telegram,
    'class' => 'ui-input',
    'placeholder' => Yii::t('form', 'Your telegram'),
    'autocomplete' => 'telegram',
];
$template = ['template' => "{label}\n" . "<div class='input-group'>\n" . "<span class='input-group-addon'>@</span>\n" . "{input}\n" . "</div>\n" . "{error}\n" . '{hint}'];
$field['telegram'] = $form->field($userChangeAccountFormModel, 'telegram', $template)
    ->textInput($options)
    ->label(Yii::t('form', 'Your telegram'));
?>

<div class="settings-tabs">
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#settings-base"><?= Yii::t('content', 'Basic'); ?></a></li>
        <li><a data-toggle="tab" href="#settings-notifications"><?= Yii::t('content', 'Notifications'); ?></a></li>
    </ul>

    <div class="tab-content">
        <div id="settings-base" class="tab-pane fade in active" role="tabpanel" aria-labelledby="settings-base-tab">
            <div class="row">
                <div class="col-md-12 pull-md-12">
                    <div class="auth__reg">
                        <div class="ui-form">
                            <div class="ui-field"><?= $field['username']; ?></div>
                            <div class="ui-field"><?= $field['new_password']; ?></div>
                            <div class="ui-field"><?= $field['password_repeat']; ?></div>
                            <div class="ui-field"><?= $field['lang']; ?></div>
                            <div class="ui-field"><?= $field['phone']; ?></div>
                            <div class="ui-field"><?= $field['skype']; ?></div>
                            <div class="ui-field"><?= $field['telegram']; ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="settings-notifications" class="tab-pane fade" role="tabpanel" aria-labelledby="settings-notifications-tab">
            <div class="row">
                <div class="col-md-12 pull-md-12">
                    <div class="auth__reg">
                        <div class="ui-form">
                            <h2 class="flex-center">This block is temporarily in development. =)</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="width-100 flex-center margin-top-10">
            <?= Html::submitButton(Yii::t('form', 'Save'), ['class' => 'btn btn--block btn--green', 'style' => 'max-width:180px; margin:auto']); ?>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>
<!-- Form UserChangeAccount:: End-->