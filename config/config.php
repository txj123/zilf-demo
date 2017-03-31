<?php

//加载函数文件
include_once APP_PATH.'/app/Common/helpers/url_helper.php';
include_once APP_PATH.'/app/Common/helpers/cookie_helper.php';
include_once APP_PATH.'/app/Common/helpers/functions.php';

return array(
    'environment' => 'dev',  //pro 生产环境  dev 开发环境 test 测试环境
    'timezone' => 'UTC',   //时区
    'language' => 'en',    //语言配置

    'framework' => [
        'bundle' => 'Http',
        'controller' => 'Index',
        'action' => 'index',

        'controller_suffix' => 'Controller', //控制器后缀
        'action_suffix' => '',   //action方法后缀
        'view_suffix' => '.php',  //视图的后缀
    ],

    'runtime' => APP_PATH . '/runtime',  //系统缓存文件路径
    'monolog' => [
        'handlers' => [
            [
                'type' => 'StreamHandler',
                'level' => 'debug',
            ]
        ]
    ],

    'redis'=>[
        'dsn'=> 'redis://127.0.0.1',
        'lifetime' => 3600,
    ],

    'cookie' => [
        'cookie_prefix' => '',
        'cookie_expire' => 3600,
        'cookie_domain' => '',
        'cookie_path' => '/',
        'cookie_secure' => false,
        'cookie_httponly' => true,
    ],

    'cache' => require(__DIR__ . '/cache.php'),

    //加载需要加载的bundle
    'bundles' => require(__DIR__ . '/bundles.php'),

    //加载数据库配置文件
    'db' => require(__DIR__ . '/databases.php'),
);