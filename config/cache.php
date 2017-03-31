<?php
/**
 * Created by PhpStorm.
 * User: lilei
 * Date: 16-11-13
 * Time: 下午3:53
 */

return [
    'default' => 'redis,file',  //如果第一个缓存配置不存在，则会食用第二个配置
    'system' => 'file', //系统缓存

    'file' => [
        'driver' => 'file',
        'path' => '/path', //默认是项目的var目录
    ],

    'apc' => [
        'driver' => 'apc',
    ],

    'array' => [
        'driver' => 'array',
    ],

    'database' => [
        'driver' => 'database',
        'table' => 'cache',
        'connection' => null,
    ],

    'memcached' => [
        'driver' => 'memcached',
        'servers' => [
            [
                'host' => '',
                'port' => '',
                'weight' => 100,
            ],
        ],
    ],

    'redis' => [
        'driver' => 'redis',
        'connection' => 'default',
    ],
];