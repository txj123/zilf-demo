<?php

/**
 * 数据库的配置信息
 */

return array(
    'default'=>array(
        'dsn' => 'mysql:host=localhost;dbname=medicinal_caiji',
        'username' => 'root',
        'password' => '123456',
        'charset' => 'utf8',
        'attributes' => [PDO::ATTR_PERSISTENT => true]
        /* 读写分离
         * 'slaveConfig' => [
            'username' => 'root',
            'password' => '123456',
            'attributes' => [
                PDO::ATTR_TIMEOUT => 10,
            ],
            'charset' => 'utf8',
        ],

        // 配置从服务器组
        'slaves' => [
            ['dsn' => 'mysql:host=localhost;dbname=sys'],
        ],*/
    )
);