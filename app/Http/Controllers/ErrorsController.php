<?php
namespace Http\Controllers;


class ErrorsController extends HttpBaseController
{
    /**
     * 404 页面
     */
    function show404()
    {
        $this->render('@errors/404');
    }

    public function show401()
    {
    }

    public function show500()
    {
    }
}