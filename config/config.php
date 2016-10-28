<?php
/**
 * Created by PhpStorm.
 * User: lilei
 * Date: 16-8-30
 * Time: 下午4:21
 */

//加载需要加载的包
$bundles = require(__DIR__ . '/bundles.php');

//加载数据库配置文件
$databases = require(__DIR__ . '/databases.php');

return array(
    'environment' => 'dev',  //pro 生产环境  dev 开发环境 test 测试环境
    'timezone' => 'UTC',   //时区
    'language' => 'en',    //语言配置

    'framework' => [
        'bundle' => 'app',
        'controller' => 'Index',
        'action' => 'index',
        'controller_suffix' => 'Controller', //控制器后缀
        'action_suffix' => '',   //action方法后缀
        'view_suffix' => '.php',  //视图的后缀
    ],
    'runtime' => APP_PATH . '/runtime',
    'monolog' => [
        'handlers' => [
            [
                'type' => 'StreamHandler',
                'level' => 'debug',
            ]
        ]
    ],
    'bundles' => $bundles,
    'db' => $databases,
);