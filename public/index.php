<?php
define('START_TIME',microtime());

/**
 * vendor
 */
require_once __DIR__.'/../vendor/autoload.php';

/**
 * 运行程序入口
 */
(new \Zilf\System\Application(realpath(__DIR__)))->run();