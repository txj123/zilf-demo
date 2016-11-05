<?php

namespace App\Controllers;

use Zilf\System\Controller;

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

    function test($id=''){
        echo 'test === '.$id;
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