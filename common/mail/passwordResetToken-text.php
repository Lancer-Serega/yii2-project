<?php

/**
 * @var $this yii\web\View
 * @var $user frontend\models\Entity\User
 */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['index/reset-password', 'token' => $user->password_reset_token]);
?>
<?= Yii::t('content', 'Hello {username}', ['username' => $user->username]); ?>,

<?= Yii::t('form', 'Follow the link below to reset your password:'); ?>

<?= $resetLink ?>
