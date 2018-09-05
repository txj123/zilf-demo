<?php

return array(
    'debug' => env('APP_DEBUG',false),
    'app_env' => env('APP_ENV','prod'),  //开发模式dev 上线模式 prod
    'app_key' => 'WEC8H5x0oEJryN62',  //app_key 必须是16位的字符串

    'timezone' => 'Asia/Shanghai',   //时区
    'language' => 'zh-CN',    //语言配置

    'framework' => [
        'bundle' => 'Index',
        'controller' => 'Index',
        'action' => 'index',

        'controller_suffix' => 'Controller', //控制器后缀
        'action_suffix' => '',   //action方法后缀
        'view_suffix' => '.php',  //视图的后缀
    ],

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
        'cookie_expire' => 3600 * 24 * 3,
        'cookie_domain' => '',
        'cookie_path' => '/',
        'cookie_secure' => false,
        'cookie_httponly' => true,
    ],

    'assets' => [
        'default' => '',
        'css_version' => 'v113232',
        'js_version' => 'v=113232',
        'img_version' => 'v113232',
    ],

    'csrf' => [
        'referfer' => [
            'scheme' => ['http','https'],
            'host' => [
                'www.glt365.me',
                'glt365.me',
                '192.168.0.168',
                'www.glt365.com',
                'glt365.com',
                '47.92.142.147',
                'localhost',
            ],
        ]
    ],

    'default_logo' => 'assets/layouts/layout/img/avatar3.jpg',
);