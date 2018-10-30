<?php

/**
 * @var $this yii\web\View
 * @var $user frontend\models\User
 */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['index/reset-password', 'token' => $user->password_reset_token]);
?>
<?= Yii::t('msg', 'Hello {username}', ['username' => $user->username]); ?>,

<?= Yii::t('app', 'Follow the link below to reset your password:'); ?>

<?= $resetLink ?>
