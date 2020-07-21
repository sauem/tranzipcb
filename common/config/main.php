<?php
use mdm\admin\Module;
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'modules' => [

    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\DbManager'
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => SQL_HOST,
            'username' => SQL_USER_NAME,
            'password' => SQL_PASSWORD,
            'charset' => 'utf8',
        ],
    ],
];
