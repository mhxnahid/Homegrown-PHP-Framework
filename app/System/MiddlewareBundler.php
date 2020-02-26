<?php

namespace App\System;

use App\System\MiddlewareIfc;

class MiddlewareBundler{

    protected $start;
    
    public function __construct()
    {
        $this->start = function(){ 
            dump('init middleware');
        };
    }

    public function add(MiddlewareIfc $middleware)
    {
        $next = $this->start;

        $this->start = function() use($middleware, $next){
            return $middleware($next);
        };
    }

    public function handle()
    {
        return call_user_func($this->start);
    }


}