<?php

namespace App\Models;

use Framework\Database\Model;

class User extends Model
{
	public $email;
	public $tableName = 'users';
}
