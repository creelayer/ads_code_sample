<?php

use yii\web\Response;

$container = require_once 'DI.php';

return [
    'id' => 'advertising-app',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'app\controllers',
    'aliases' => [
        '@app' => dirname(__DIR__),
    ],
    'components' => [
        'request' => [
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'response' => [
            'class' => 'yii\web\Response',
            'on beforeSend' => function ($event) {
                $response = $event->sender;
                if (in_array($response->format, [Response::FORMAT_JSON, Response::FORMAT_XML])) {
                    $response->data = [
                        'success' => $response->isSuccessful,
                        'result' => $response->data,
                    ];
                }
            },
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'ads',
                    'only' => ['create', 'view'],
                ],
            ]
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache', //there may be redis
        ],
        'user' => [
            'identityClass' => 'models\User'
        ],
        'db' => [
            'class' => 'yii\db\Connection'
        ],
    ],
    'container' => $container
];