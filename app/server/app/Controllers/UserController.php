<?php

namespace App\Controllers;

use App\Models\User;
use Framework\Request;
use Framework\Response\Response;
use App\Requests\UserStoreRequest;
use App\Requests\UserDestroyRequest;

class UserController
{	
	public function index(): Response
	{
		$data = (new Request)->getDataFromGetRequest();

		return User::sortBy($data)->where($data)->select($data);
	}

	public function store(): Response
	{
		$validated = (new UserStoreRequest)->validateObject();

		return User::create($validated);
	}
	
	public function destroy(): Response
	{
		$validated = (new UserDestroyRequest)->validateArray();

		return User::whereIn([
			'collumn' => 'id', 
			'selected' => $validated
		])->delete();
	}
}
	