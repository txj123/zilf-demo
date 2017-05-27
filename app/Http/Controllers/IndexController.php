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
}