<?php

use Framework\Request;
use Framework\Response\Response;

function request($property = null) : mixed
{
    $request = new Request();

    if (is_null($property)) {
        return $request;
    }

    return $request->get($property);
}

function response($data = '') : Response
{
    return new Response($data);
}

function addCorsHeaders()
{
    header("Access-Control-Allow-Origin: http://localhost:3333");
    header("Access-Control-Allow-Headers: content-type");
    header("Access-Control-Allow-Methods: GET, POST, DELETE");
}