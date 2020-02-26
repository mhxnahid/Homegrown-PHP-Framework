<?php

namespace App\Controllers;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController{
    public string $title;

    public function __construct()
    {
        $this->title = 'Home Page';
    }

    public function index()
    {
        $res = Response::create('Home');
        return $res->send();
    }
}