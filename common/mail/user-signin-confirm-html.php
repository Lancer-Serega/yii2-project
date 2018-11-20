<?php
/**
 * Created by PhpStorm.
 * UserEntity: sergey
 * Date: 31.10.18
 * Time: 15:55
 */

use frontend\models\Entity\UserEntity;
use yii\helpers\Html;

/* @var $user UserEntity */

$confirmLink = Yii::$app->urlManager->createAbsoluteUrl(['/signin-confirm', 'token' => $user->email_confirm_token]);
?>
<div class="password-reset">
    <p><?= Yii::t('content', 'Hello {username}',['username' => Html::encode($user->username)]); ?>,</p>

    <p><?= Yii::t('form', 'Follow the link below to confirm your email:'); ?></p>

    <p><?= Html::a(Html::encode($confirmLink), $confirmLink) ?></p>
</div>