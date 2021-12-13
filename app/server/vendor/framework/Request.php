<?php

namespace Framework;

use Framework\Validate\Validator;

class Request
{
    public $requestData;
    public $path;
    public $httpMethod;

    public function __construct()
    {
        $this->requestData  = $this->getRequest();
        $this->path     = $this->getPath();
        $this->httpMethod   = $this->getHttpMethod();
    }

    public function getRequest()
    {
        return json_decode(file_get_contents('php://input'), true);
    }

    public function getDataFromGetRequest()
    {
        return $_GET;
    }

    public function getPath() : string
    {
        $requestArray = explode("?", $_SERVER['REQUEST_URI']);
        return $requestArray[0];
    }

    public function getHttpMethod() : string
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public function validateObject() : array
    {
        return (new Validator)->validateObject($this->requestData['data'], $this->rules());
    }

    public function validateArray() : array
    {
        return (new Validator)->validateArray($this->requestData, $this->rules());
    }

    public static function create() : self
    {
        return new static();
    }
}


