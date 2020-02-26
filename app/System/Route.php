<?php

namespace App\System;

use Closure;

class Route{

    protected array $routes = [];

    public function __construct()
    {
        //
    }

    public function Get($url, $callback)
    {
        $this->registerRoutes($url, $callback);
    }

    protected function registerRoutes($url, $callback)
    {
        $this->routes[$url] = $callback;
    }

    public function allRoutes()
    {
        return $this->routes;
    }

}