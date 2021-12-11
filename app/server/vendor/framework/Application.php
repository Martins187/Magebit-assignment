<?php

namespace Framework;

use Framework\Request;
use App\Routing\Routes;
use Framework\Routing\Router;
use Framework\Response\Response;

class Application 
{
	/**
	 * Returning the response based on the request.
	 */
	public function run()
	{
		$response = $this->handle(Request::create());
		$response->send();
	}
	
	/**
	 * Handling the request.
	 */
	public function handle(Request $request): Response
	{
		$routes = (new Routes)->register();
		$router = new Router($routes->routes);

		addCorsHeaders();
		$response = $router->match($request);

		return $response;
	}
	
}