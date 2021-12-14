<?php

namespace Framework\Routing;

use Framework\Request;
use Framework\Response\Response;

class Router {
	
	protected $routes = [];
	
	function __construct(array $routes)
	{
		$this->routes = $routes;
	}
		
	function match(Request $request): Response
	{
		foreach($this->routes as $route)
		{
			if($route->path == $request->path && $route->httpMethod == $request->httpMethod)
			{
				$method = $route->method;
				return $route->action::$method();
			}
		}
	}
}
	
