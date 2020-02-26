<?php

namespace App\Middleware;

use App\System\MiddlewareIfc;
use Closure;

class SecondMiddleware implements MiddlewareIfc{
    
    public function __invoke(Closure $next)
    {
        dump(__CLASS__);

        return $next();
    }
}