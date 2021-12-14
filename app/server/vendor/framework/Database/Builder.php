<?php

namespace Framework\Database;

use Framework\Response\Response;

use PDO;

class Builder {
	
	protected $dbh;
    protected $query = '';

 
    protected $table = '';

    function __construct()
    {
        $this->dbh = (new Connection)->connect();
    }

    public function prependStatement(string $sql)
    {
        $this->query = $sql . $this->query;
    }

    public function addStatement(string $sql)
    {
        $this->query .= $sql;
    }

    public function execute()
    {
        $this->query = $this->dbh->prepare($this->query);
        $this->query->execute();
    }

    public function fetchAll() : Response
    {
        $this->execute();
        return response($this->query->fetchAll(PDO::FETCH_OBJ));
    }
}

