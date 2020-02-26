<?php

use App\System\Bootstrap;
use App\Middleware\AuthMiddleware;
use App\Middleware\SecondMiddleware;

require __DIR__ . '/../vendor/autoload.php';

//whoops
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

//dotenv
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../');
$dotenv->load();

$h = new Bootstrap();

$h->routeHandler();

$h->middleware(new AuthMiddleware());
$h->middleware(new SecondMiddleware());

$h->run();
