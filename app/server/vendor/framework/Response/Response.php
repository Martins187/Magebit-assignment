<?php

namespace Framework\Response;

class Response 
{
    public  $content;
    
    function __construct($data)
    {
        $this->content = $this->toJson($data);
    }

    public function sendServerError()
    {
        header('X-PHP-Response-Code: 400', true, 400);
    }

    public function toJson($data) : string
    {
        return json_encode($data);
    }

    public function sendHeaders()
    {
        header('Content-Type: application/json; charset=utf-8');
    }

    public function sendContent()
    {
        echo $this->content;
    }

    public function send()
    {
        $this->sendHeaders();
        $this->sendContent();
    }
}