<?php

/**
 * 必须设置的目录路径
 */
define('ROOT_PATH',dirname(__FILE__));

/**
 *应用程序目录
 */
define('APP_PATH',ROOT_PATH);

/**
 * vendor
 */
require_once __DIR__.'/vendor/autoload.php';

/**
 * 配置文件路径
 */
$config = ROOT_PATH.'/config/config.php';

/**
 * 运行程序入口
 */
(new \Zilf\System\Application($config))->run();