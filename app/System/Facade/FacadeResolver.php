<?php

namespace App\System\Facade;

abstract class FacadeResolver{

    public static function __callStatic($method, $args)
    {
        $name = static::getFacadeClass();

        $instance = new $name;
        $instance->$method(...$args);
    }

}