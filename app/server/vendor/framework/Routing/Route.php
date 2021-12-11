<?php

namespace Framework\Routing;

use stdClass;

/**
 * Defining the path, http method and the 
 * consequent action for the requests from
 * the client.
 */
class Route {
	
	public $routes = [];
	
	function get($path, $action, $method) 
	{
		$route = new stdClass;
		$route->path = $path;
		$route->httpMethod = 'GET';
		$route->action = $action;
		$route->method = $method;
		array_push($this->routes, $route);
	}

	function post($path, $action, $method) 
	{
		$route = new stdClass;
		$route->path = $path;
		$route->httpMethod = 'POST';
		$route->action = $action;
		$route->method = $method;
		array_push($this->routes, $route);
	}

	function delete($path, $action, $method) 
	{
		$route = new stdClass;
		$route->path = $path;
		$route->httpMethod = 'DELETE';
		$route->action = $action;
		$route->method = $method;
		array_push($this->routes, $route);
	}
}
