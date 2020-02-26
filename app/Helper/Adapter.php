<?php
namespace App\Helper;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class MainAdapter{
    public Request $request;

    public function __construct()
    {
        $this->request = Request::createFromGlobals();
    }
}

class Adapter extends MainAdapter {
    protected string $title;
    protected array $items;

    public function __construct()
    {
        parent::__construct();
    }

    public function add(string $box) : Adapter
    {
        $this->items[] = $box;
        return $this;
    }

    public function send() : Response
    {
        $res = Response::create('Home');
        return $res->send();
    }
}