<?php
namespace App;

use App\System\Route;

class RouteList{

    public static function get()
    {
        $route = new Route;

        $route->Get('/', function(){
            return 'Index';
        });

        $route->Get('home', function(){
            return 'Homepage';
        });

        $route->Get('send', function(){
            return 'Send Email';
        });

        $route->Get('about', 'AboutController@about');

        //dump($route->allRoutes());

        return $route->allRoutes();       
    }
}