<?php

namespace Framework;

use Framework\Request;
use App\Routing\Routes;
use Framework\Routing\Router;
use Framework\Response\Response;

class Application 
{
	public function run()
	{
		$response = $this->handle(Request::create());
		$response->send();
	}
	
	public function handle(Request $request): Response
	{
		$routes = (new Routes)->register();
		$router = new Router($routes->routes);

		addCorsHeaders();
		$response = $router->match($request);

		return $response;
	}
	
}