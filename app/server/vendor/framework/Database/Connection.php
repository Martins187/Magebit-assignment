<?php

namespace Framework\Database;

use PDO;

class Connection 
{
    public function connect() : PDO
    {
        try
        {
            $dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset".DB_CHARSET;
            $options = array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );
            $dbh = new PDO($dsn, DB_USER, DB_PASS, $options);

            return $dbh;
        }
        catch(PDOException $e)
        {
            echo "Connection failed: ".$e->getMessage();
        }
    }

}