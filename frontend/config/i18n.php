<?php

use yii\i18n\PhpMessageSource;

return [
    'translations' => [
        'app' => [
            'class' => PhpMessageSource::class,
            'basePath' => '@frontend/i18n',
            'sourceLanguage' => 'en-US',
            'fileMap' => [
                'app' => 'app.php',
            ],
        ],
        'content' => [
            'class' => PhpMessageSource::class,
            'basePath' => '@frontend/i18n',
            'sourceLanguage' => 'en-US',
            'fileMap' => [
                'content' => 'content.php',
            ],
        ],
        'form' => [
            'class' => PhpMessageSource::class,
            'basePath' => '@frontend/i18n',
            'sourceLanguage' => 'en-US',
            'fileMap' => [
                'form' => 'form.php',
            ],
        ],
        'error' => [
            'class' => PhpMessageSource::class,
            'basePath' => '@frontend/i18n',
            'sourceLanguage' => 'en-US',
            'fileMap' => [
                'error' => 'error.php',
            ],
        ],
        'mail' => [
            'class' => PhpMessageSource::class,
            'basePath' => '@frontend/i18n',
            'sourceLanguage' => 'en-US',
            'fileMap' => [
                'mail' => 'mail.php',
            ],
        ],
        'menu' => [
            'class' => PhpMessageSource::class,
            'basePath' => '@frontend/i18n',
            'sourceLanguage' => 'en-US',
            'fileMap' => [
                'menu' => 'menu.php',
            ],
        ],
    ],
];