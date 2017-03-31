<?php

namespace Http\Controllers;

use App\Models\Category;
use DebugBar\DebugBar;
use DebugBar\StandardDebugBar;
use Zilf\Db\Connection;
use Zilf\HttpFoundation\Cookie;
use Zilf\HttpFoundation\Response;
use Zilf\Support\DB;
use Zilf\System\Zilf;

/**
 * Created by PhpStorm.
 * User: lilei
 * Date: 16-8-28
 * Time: 下午3:13
 */
class IndexController extends HttpBaseController
{
    public $name;

    /**
     * 首页
     */
    function index(){
        return $this->render('index','',$response);
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