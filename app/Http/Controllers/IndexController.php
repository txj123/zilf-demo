<?php

namespace App\Http\Controllers;


class IndexController extends HttpBaseController
{
    public $name;

    /**
     * 首页
     */
    function index(){
        return $this->render('index');
    }


    /**
     *
     */
    function memory(){
        $size= memory_get_usage();
        $unit=array('b','kb','mb','gb','tb','pb');
        echo @round($size/pow(1024,($i=floor(log($size,1024)))),2).' '.$unit[$i];
        die();
    }
}