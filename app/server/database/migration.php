<?php

/**
 * This file is executed only once when setting up the project,
 * it creates the necessary table in the database.
 */

include 'config.php';

$dbh = new PDO('mysql:dbname='.DB_NAME.';host='.DB_HOST, DB_USER, DB_PASS);

$statements = [
    'CREATE TABLE `users` (
        `id` int(11) NOT NULL,
        `email` varchar(30) NOT NULL,
        `email_provider` varchar(20) NOT NULL,
        `created_at` datetime DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;',
  
    'ALTER TABLE `users`
    ADD PRIMARY KEY (`id`);',
  
    'ALTER TABLE `users`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
    COMMIT;'
];

foreach($statements as $statement)
{
    $dbh->exec($statement);
}
