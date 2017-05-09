<?php
define('START_TIME',microtime());

/**
 * 必须设置的目录路径
 */
define('ROOT_PATH',dirname(__FILE__));

/**
 *应用程序目录
 */
define('APP_PATH',dirname(ROOT_PATH));

/**
 * 是否开启调试模式
 */
define('APP_DEBUG',true);

/**
 * vendor
 */
require_once __DIR__.'/../vendor/autoload.php';

/**
 * 运行程序入口
 */
(new \Zilf\System\Application('dev'))->run();