<?php

namespace Framework\Database;

use Framework\Database\QueryBuilder;

class Model
{
	protected $queryBuilder;

	function __construct()
	{
		$this->queryBuilder = new QueryBuilder;
	}

	function __call(string $name, array $args)
	{
		return $this->queryBuilder->$name($args[0][0], $this->tableName);
	}

	public static function __callStatic(string $method, array $parameters)
    {
        return (new static)->$method($parameters);
    }

}
