<!-- Form UserChangeAccount:: Start-->
<?php

/**
 * Created by PhpStorm.
 * UserEntity: sergey
 * Date: 07.11.18
 * Time: 14:00
 */

use \frontend\models\Entity\UserEntity;
use \frontend\models\Form\UserChangeAccountForm;
use \yii\web\View;
use \yii\web\YiiAsset;
use \yii\widgets\ActiveForm;
use \yii\helpers\Html;
use \yii\helpers\Url;

/**
 * @var View $this
 * @var UserChangeAccountForm $userChangeAccountForm
 * @var string $formUrl
 * @var UserEntity $user
 * @var array $langList
 * @var array $notificationList
 * @var array $notificationUserList
 */

$this->registerJsFile($this->theme->getBaseUrl() . '/js/switch.js', ['position' => $this::POS_END, 'depends' => YiiAsset::class]);

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
$options = ['class' => 'form-control', 'options' => [$user->getLanguage()->id => ['Selected' => true]]];
$field['language'] = $form->field($userChangeAccountForm, 'language')
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
                <span class="hidden-xs-down">
                    <i class="mdi mdi-clipboard-account mr-2"></i>
                    <?= Yii::t('content', 'Basic'); ?>
                </span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#settings-notifications" role="tab" aria-selected="false">
                <span class="hidden-sm-up">
                    <i class="ti-user"></i>
                </span>
                <span class="hidden-xs-down">
                    <i class="mdi mdi-bell-ring-outline mr-2"></i>
                    <?= Yii::t('content', 'Notifications'); ?>
                </span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#settings-empty" role="tab" aria-selected="false">
                <span class="hidden-sm-up">
                    <i class="ti-email"></i>
                </span>
                <span class="hidden-xs-down"><i class="mdi mdi-incognito mr-2"></i>Empty tab</span>
            </a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active show" id="settings-base" role="tabpanel">
            <div class="ui-field"><?= $field['username']; ?></div>
            <div class="ui-field"><?= $field['new_password']; ?></div>
            <div class="ui-field"><?= $field['password_repeat']; ?></div>
            <div class="ui-field"><?= $field['language']; ?></div>
            <div class="ui-field"><?= $field['phone']; ?></div>
            <div class="ui-field"><?= $field['skype']; ?></div>
            <div class="ui-field"><?= $field['telegram']; ?></div>
        </div>

        <div class="tab-pane p-20" id="settings-notifications" role="tabpanel">
            <span class="text-info">
                <?= Yii::t('content', 'All notifications are sent to your email:'); ?>
                <strong><?= $user->email; ?></strong>
            </span>
            <hr>

            <table class="table table-hover">
                <?php foreach ($notificationList as $notification):
                    $checked = false;
                    foreach ($notificationUserList as $notificationUser) {
                        if ($notification['name'] === $notificationUser['notification_name']) {
                            $checked = (bool)$notificationUser['value'];
                            break;
                        }
                    }
                ?>
                    <tr>
                        <td>
                            <div class="switch">
                                <label style="display:inline-flex; position:relative;">
                                    <span class="text-danger">OFF</span>
                                    <input name="<?= $notification['name']; ?>"
                                           type="checkbox"
                                           data-type="switch-checkbox"
                                           data-url="<?= Url::to(['user-settings/change-notification']); ?>"
                                           <?= $checked ? 'checked' : ''; ?>
                                    >
                                    <span class="lever"></span>
                                    <span class="text-success">ON</span>
                                </label>
                            </div>
                        </td>
                        <td>
                            <?= Yii::t('content', $notification['description']); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>

        <div class="tab-pane p-20" id="settings-empty" role="tabpanel"><h2>Empty tab content!</h2></div>
    </div>
</div>

<?php $options = ['class' => 'btn btn--block btn--green', 'style' => 'max-width:180px; margin:auto']; ?>
<?= Html::submitButton(Yii::t('form', 'Save'), $options); ?>

<?php ActiveForm::end(); ?>
<!-- Form UserChangeAccount:: End-->