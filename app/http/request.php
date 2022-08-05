<?php

namespace App\http;

use App\controllers\usuarioController;


class request
{

    private $url;
    private $controller;
    private $method;



    public function __construct()
    {

        $this->url =  explode("/", $_SERVER['REQUEST_URI']);
        $this->controller = $this->url[2] ?? null;
        $this->method = $this->url[3] ?? null;
    }


    public function requestController()
    {



        $controller = "App\controllers\\{$this->controller}";


        $response  =  call_user_func(array(new $controller, $this->method));

        
        return $response;


    }
}
