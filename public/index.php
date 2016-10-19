<?php
define('START_TIME',microtime());

//当前根目录
defined('ZILF_DEBUG') or define('ZILF_DEBUG', true);


/**
 *  development
 *  testing
 *  production
 */
defined('ZILF_ENV') or define('ZILF_ENV', 'dev');

define('CI_DEBUG',true);

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

\Zilf\Debug\Debug::enable();


(new \Zilf\System\Application())->run();