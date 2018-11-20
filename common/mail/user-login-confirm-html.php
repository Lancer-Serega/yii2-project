<?php
/**
 * Created by PhpStorm.
 * UserEntity: sergey
 * Date: 20.11.18
 * Time: 14:35
 */

use frontend\models\Entity\UserEntity;
use yii\helpers\Html;

/* @var UserEntity $user */
/* @var string $twoFactorAuthKey */

$confirmLink = Yii::$app->urlManager->createAbsoluteUrl(['/accept-two-factor-auth', 'key' => $twoFactorAuthKey]);
?>
<div class="login-confirm">
    <p><?= Yii::t('content', 'Hello {username}',['username' => Html::encode($user->username)]); ?>,</p>

    <p><?= Yii::t('form', 'Follow the link below to confirm your email:'); ?></p>

    <p><?= Html::a(Html::encode($confirmLink), $confirmLink) ?></p>
</div>
