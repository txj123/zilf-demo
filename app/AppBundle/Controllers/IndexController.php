<?php

namespace App\Controllers;

use App\Models\Test;
use App\Models\ZnCaijiRule;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Zilf\Curl\Curl;
use Zilf\Curl\CurlException;
use Zilf\Db\Connection;
use Zilf\Db\Query;
use Zilf\HttpFoundation\Request;
use Zilf\Log\Writer;
use Zilf\System\Controller;
use Zilf\System\Zilf;

/**
 * Created by PhpStorm.
 * User: lilei
 * Date: 16-8-28
 * Time: 下午3:13
 */
class IndexController extends Controller
{
    public $name;

    /**
     * 首页
     */
    function index(){
        $this->memory();
        $this->render('index');
    }

    
    function show(){
        echo 'rrr';
    }

    /**
     *
     */
    function memory(){
        $size= memory_get_usage();
        $unit=array('b','kb','mb','gb','tb','pb');
        echo @round($size/pow(1024,($i=floor(log($size,1024)))),2).' '.$unit[$i];
    }
}