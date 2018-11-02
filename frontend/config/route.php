<?php

return [
    '<action:(login|logout|signin|request-password-reset|reset-password|signin-confirm|resend-email)>' => 'identity/<action>',
    '<lang:[\w_]{0,2}?><controller:(cabinet|blog|tariff)>' => '<lang><controller>/index',
    '<controller:\w+>/<action:\w+>/' => '<controller>/<action>',
    '/' => 'index/index',
    'robots.txt' => 'seo/manage/get-robots',
];