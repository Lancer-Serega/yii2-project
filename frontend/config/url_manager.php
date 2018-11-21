<?php

use frontend\models\Entity\LanguageEntity;
use \yii\web\UrlManager;

$controllerList = implode('|', [
    'index',
    'cabinet',
    'user-security',
    'user-settings',
    'language',
]);

$indexActionList = implode('|', [
    'index',
    'feedback',
    'faq',
    'contact',
    'about',
]);

$identityActionList = implode('|', [
    'login',
    'logout',
    'signin',
    'request-password-reset',
    'reset-password',
    'signin-confirm',
    'resend-email',
    'accept-two-factor-auth',
    'two-factor-auth-key-reset',
    'check-two-factor-auth',
]);

$cabinetActionList = implode('|', [
    'settings',
    'security',
    'support',
]);

$languageList = implode('|', LanguageEntity::$languageList);

return [
    'class'=> UrlManager::class,
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'suffix' => '',
    'rules' => [
        "<controller:(language)>/<action:(switch)>/<language:($languageList)>" => '<controller>/<action>', // Switch language
        'robots.txt' => 'seo/manage/get-robots',
        "<controller:($controllerList)>" => '<controller>/index',
        "<action:($indexActionList)>" => 'index/<action>',
        "<action:($identityActionList)>" => 'identity/<action>',
        "<action:($cabinetActionList)>" => 'cabinet/<action>',
    ],
];