<?php

return [
    '<action:(login|logout|signin|request-password-reset|reset-password|signin-confirm|resend-email)>' => 'identity/<action>',
    '<controller:(cabinet|blog|tariff)>' => '<controller>/index',
    '<controller:\w+>/<action:\w+>/' => '<controller>/<action>',
    '/' => 'index/index',
    'robots.txt' => 'seo/manage/get-robots',
];