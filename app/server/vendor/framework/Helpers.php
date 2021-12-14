<?php

use Framework\Response\Response;

function response($data = '') : Response
{
    return new Response($data);
}

function addCorsHeaders()
{
    header("Access-Control-Allow-Origin: http://martins-balcuns.magebithr.com");
    header("Access-Control-Allow-Headers: content-type");
    header("Access-Control-Allow-Methods: GET, POST, DELETE");
}