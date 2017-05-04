<?php
use \Zilf\System\Zilf;
use \Zilf\Support\Arr;

/**
 * redis 的连接对象
 */
Zilf::$container->register('redis',function (){
    $config = Zilf::$container->get('config')->get('cache.redis');

    return new \Zilf\Redis\RedisManager(Arr::pull($config, 'client', 'predis'), $config);
});

/**
 * redis的连接服务
 */
Zilf::$container->register('redis.connection',function (){
    return Zilf::$container->get('redis')->connection();
});

Zilf::$container->register('cache.store', function ($app) {
    return Zilf::$container['cache']->driver();
});

Zilf::$container->register('memcached.connector', function () {
    return new \Zilf\Cache\MemcachedConnector();
});