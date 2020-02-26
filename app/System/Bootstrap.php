<?php
namespace App\System;

use App\RouteList;
use App\System\MiddlewareIfc;
use App\System\MiddlewareBundler;
use App\System\Facade\ResponseFacade;

class Bootstrap{

    protected $middleware;

    protected $res;

    public function __construct()
    {
        $this->middleware = new MiddlewareBundler();
    }

    public function routeHandler()
    {
        $noQs = strtok($_SERVER["REQUEST_URI"],'?');
        $uri = ltrim($noQs, "/");
        //$split = explode('/', $uri);

        //$lastSlashAt = (count($split) > 1) ? count($split) - 1 : 0 ;

        $uri = ($uri == "") ? "/" : $uri;

        $routes = RouteList::get();
        //dump($routes);

        if(array_key_exists($uri, $routes)){
            $this->execRoute($routes, $uri);
        }else{
            $this->res = '404!';
        }

        //dump($split);
    }

    public function execRoute($routes, $uri)
    {
        if(is_callable($routes[$uri])){
            $this->res = $routes[$uri]();
            return;
        }

        $split = explode('@', $routes[$uri]);
        $controller = "\App\Controllers\\".$split[0];
        $method = $split[1];
        
        $init = new $controller;
        $this->res = $init->$method();
    }

    public function middleware(MiddlewareIfc $middleware)
    {   
        $this->middleware->add($middleware);
    }

    public function run()
    {
        $this->middleware->handle();

        ResponseFacade::send($this->res);
    }
}