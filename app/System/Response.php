<?php

namespace App\System;

use Symfony\Component\HttpFoundation\Response as HttpFoundationResponse;

class Response{

    private $body;

    private function prepareBody() : string
    {
        $res = '<html><head></head><body>';
        $res .= $this->body;
        $res .= '</body></html>';

        return $res;
    }
    
    public function send($body)
    {
        $this->body = $body;

        $res = new HttpFoundationResponse(
            $this->prepareBody(),
            HttpFoundationResponse::HTTP_OK,
            ['content-type' => 'text/html']
        );

        $res->send();
    }
}