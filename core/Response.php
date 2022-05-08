<?php

namespace App;

class Response
{
    public $response;

    public function setResponse($content)
    {
        $this->response = $content;
    }

    public function getResponse()
    {
        return $this->response;
    }

}