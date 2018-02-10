<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        /*'authClientCollection' => [
            'class'   => \yii\authclient\Collection::className(),
            'clients' => [
                    'vkontakte' => [
                    'class'        => 'dektrium\user\clients\VKontakte',
                    'clientId'     => '6364340',
                    'clientSecret' => 'haq5wZ5OsGomOhoducn4',
                    ],
            ],
        ],*/
    ],
    /*'modules' => [
    'user' => [
        'class' => 'dektrium\user\Module',
        // you will configure your module inside this file
        // or if need different configuration for frontend and backend you may
        // configure in needed configs
        ],
    ]*/
];
