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
 * vendor
 */
require_once __DIR__.'/../vendor/autoload.php';

Zilf\Debug\Debug::enable();
//'environment' => 'dev',  //pro 生产环境  dev 开发环境 test 测试环境
/**
 * 运行程序入口
 */
(new \Zilf\System\Application('dev'))->run();