<?php
use yii\helpers\Html;

/**
 * @var $this yii\web\View
 * @var $user frontend\models\Entity\User
 */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['index/reset-password', 'token' => $user->password_reset_token]);
?>
<div class="password-reset">
    <p><?= Yii::t('content', 'Hello {username}', ['username' => Html::encode($user->username)]); ?>,</p>

    <p><?= Yii::t('form', 'Follow the link below to reset your password:'); ?></p>

    <p><strong><?= Html::a(Html::encode($resetLink), $resetLink) ?></strong></p>
</div>
