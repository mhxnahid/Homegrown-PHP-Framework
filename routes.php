<?php

use App\Controllers\HomeController;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return function (RoutingConfigurator $routes) {
    $routes->add('home', '/home')
        ->controller([HomeController::class, 'index'])
        ->methods(['GET', 'HEAD'])
    ;
};