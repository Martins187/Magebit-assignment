<?php

namespace App\Models;

use Framework\Database\Model;

/**
 * Only the tableName attribute is for the use,
 * the rest are for the convinience.
 */
class User extends Model
{
	public $email;
	public $tableName = 'users';
}
