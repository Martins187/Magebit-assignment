<?php

namespace App\Routing;

use App\Controllers\UserController;
use Framework\Routing\Route;

class Routes 
{
	function register() : Route
	{
		$routes = new Route;
		$routes->get('/user', UserController::class, 'index'); 
 		$routes->post('/user', UserController::class, 'store');		
 		$routes->delete('/user', UserController::class, 'destroy');		
		
		return $routes;
	}
	
}