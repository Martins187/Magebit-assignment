<?php

namespace Framework\Database;

use Framework\Database\QueryBuilder;

class Model
{
	protected $queryBuilder;

	/**
	 * Creating a new instance of Querybuilder.
	 */
	function __construct()
	{
		$this->queryBuilder = new QueryBuilder;
	}

	/**
	 * Calling a function directly to the initially
	 * created 'Querybuilder' so that using additional 
	 * functions in this instance could be skipped.
	 */
	function __call(string $name, array $args)
	{
		return $this->queryBuilder->$name($args[0][0], $this->tableName);
	}

	/**
	 * This is for making code cleaner and not write
	 * "(new ClassName)->function()" each time child 
	 * instance is called.
	 */
	public static function __callStatic(string $method, array $parameters)
    {
        return (new static)->$method($parameters);
    }

}
