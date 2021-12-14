<?php

namespace App\Routing;

use App\Controllers\UserController;
use Framework\Routing\Route;

class Routes 
{
	function register() : Route
	{
		$routes = new Route;
		$routes->get('/api/user', UserController::class, 'index'); 
 		$routes->post('/api/user', UserController::class, 'store');		
 		$routes->delete('api/user', UserController::class, 'destroy');		
		
		return $routes;
	}
	
}
