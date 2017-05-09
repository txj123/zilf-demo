<?php

return array(
    'timezone' => 'Asia/Shanghai',   //时区
    'language' => 'zh-CN',    //语言配置

    'framework' => [
        'bundle' => 'http',
        'controller' => 'index',
        'action' => 'index',

        'controller_suffix' => 'Controller', //控制器后缀
        'action_suffix' => '',   //action方法后缀
        'view_suffix' => '.php',  //视图的后缀
    ],

    'app_key' => 'HMC6Y5x0oECryN32',  //app_key 必须是16位的字符串

    'runtime' => APP_PATH . '/runtime',  //系统缓存文件路径
    'monolog' => [
        'handlers' => [
            [
                'type' => 'StreamHandler',
                'level' => 'debug',
            ]
        ]
    ],

    'cookie' => [
        'cookie_prefix' => '',
        'cookie_expire' => 3600 * 24,
        'cookie_domain' => '',
        'cookie_path' => '/',
        'cookie_secure' => false,
        'cookie_httponly' => true,
    ],

    'assets' => [
        'default' => '',
        'css_version' => 'v112233',
        'js_version' => 'v=112233',
        'img_version' => 'v112233',
    ],

    'cache' => require(__DIR__ . '/cache.php'),

    //加载需要加载的bundle
    'bundles' => require(__DIR__ . '/bundles.php'),

    //加载数据库配置文件
    'db' => require(__DIR__ . '/databases.php'),
);