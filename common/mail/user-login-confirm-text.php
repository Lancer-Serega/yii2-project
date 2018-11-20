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

<?= Yii::t('content', 'Hello {username}',['username' => Html::encode($user->username)]); ?>,

<?= Yii::t('form', 'Follow the link below to confirm your email:'); ?>

<?= Html::a(Html::encode($confirmLink), $confirmLink) ?>
