<?php

use yii\web\Response;

return [
    'id' => 'adv-console',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'app\controllers',
    'aliases' => [
        '@app' => dirname(__DIR__),
    ],
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'pgsql:host=db;port=5432;dbname=ads',
            'username' => 'postgres',
            'password' => 'postgres',
            'charset' => 'utf8',
            //'enableSchemaCache' => true,
        ],
    ],
];