<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 31.10.18
 * Time: 15:55
 */

use frontend\models\User;
use yii\helpers\Html;

/* @var $user User */

$confirmLink = Yii::$app->urlManager->createAbsoluteUrl(['/signin-confirm', 'token' => $user->email_confirm_token]);

echo Yii::t('content', 'Hello {username}',['username' => Html::encode($user->username)]) . PHP_EOL;
echo Yii::t('form', 'Follow the link below to confirm your email:') . PHP_EOL;
echo $confirmLink . PHP_EOL;