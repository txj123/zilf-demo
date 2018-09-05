<?php

/**
 * @var \Zilf\Routing\Route $route;
 */

$route->any('/test(/:id)', ['App\Http\Index\Controllers\IndexController', 'index']);


