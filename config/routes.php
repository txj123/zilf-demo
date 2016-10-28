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

$route->any('/test(/:id)', ['App\Controllers\IndexController', 'test']);


