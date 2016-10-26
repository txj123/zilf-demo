<?php
/**
 * Created by PhpStorm.
 * User: lilei
 * Date: 16-8-30
 * Time: 下午4:07
 */

/**
 * @var \Zilf\Routing\Route $route;
 */

$route->get('/test(/:id)', ['App\Controllers\Index', 'test'],
    [
        'require' => [':id' => '\d+',],
        'default' => [':id' => '1',]
    ]
);

