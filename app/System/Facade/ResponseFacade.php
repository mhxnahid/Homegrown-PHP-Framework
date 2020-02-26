<?php

namespace App\System\Facade;

use App\System\Facade\FacadeResolver;

class ResponseFacade extends FacadeResolver{

    protected static function getFacadeClass(){
        return \App\System\Response::class;
    }

}