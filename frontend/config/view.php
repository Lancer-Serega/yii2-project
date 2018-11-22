<?php

use frontend\components\Theme;
use frontend\components\View;

//$theme = Yii::$app->user ? 'admin-pro' : 'basic';

return [
    'class' => View::class,
    'theme' => [
        'class' => Theme::class,
        'active' => 'basic',
        'pathMap' => [
            'basic' => [
                '@app/views' => ['@app/themes/basic/views']
            ],
            'admin-pro' => [
                '@app/views' => ['@app/themes/admin-pro/views']
            ]
        ]
    ],
//    'theme' => [
//        'basePath' => '@app/themes/basic',
//        'baseUrl' => '@web/themes/basic',
//        'pathMap' => [
//            '@app/views' => [
//                '@app/views/themes/basic',
//            ],
//        ],
//    ],
];
