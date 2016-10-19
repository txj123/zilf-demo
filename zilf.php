<?php
/**
 * Created by PhpStorm.
 * User: lilei
 * Date: 16-9-6
 * Time: 上午9:24
 */

$path = $argv;
if($argc >= 2){
    list($sript,$path) = $argv;
}else{
    $path = 'index/index';
}

define('CLI_PATH',$path);

require __DIR__.'/bootstrap/autoload.php';

$config = array(
    'bundles' => array('app'),
    'default' =>'app',
    'databases' => array(),
);
new \Zilf\System\Router($config);