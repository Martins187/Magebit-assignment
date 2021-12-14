<?php

use Framework\Response\Response;

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