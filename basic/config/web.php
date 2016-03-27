<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],

    //[МАРШРУТИЗАЦИЯ] Вставка маршрута по умолчанию, вместо того который сразу был перекидывал нас на Home
//    'defaultRoute' => 'site/login',

    //[МАРШРУТИЗАЦИЯ] Заглушка если сайт находитсья на реконструкции
//    'catchAll' => ['\'/site/register\''],


    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '123456',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.

            //[ПОЧТОВИК НАСТРАЙВАЕМ]
            //'useFileTransport' => true,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'master.vorobey@gmail.com',
                'password' => '',
                'port' => '587',
                'encryption' => 'tls',
            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),

        'urlManager' => [
            'enablePrettyUrl' => true,
            //'dashboard' => 'main/index',
            'rules' => [
                // [МАРШРУТИЗАЦИЯ] тут пишем правила  для задания собственных маршрутов
                '/register' => '/site/register',
                // раньше писали site/show/id=1 а сейчас через регулярку
                '/site/show/<id:\d+>' => '/site/show',
//                '/id<id:\d+>' => '/site/show'
                '/id<id:\d+>' => '/site/show',
                '/school/edit/<id:\d+>' => '/school/edit'
            ],
        ],

    ],
    'params' => $params,
];

//этот блок для отображения вверху имени пользователя вроде, и его можно потом закоммитить
if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
