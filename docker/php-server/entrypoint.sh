#!/bin/sh

while ! $(nc -z mage-bit-mysql 3306) ; do sleep 1; echo "---> Waiting for MySQL to come up..."; done

echo "Running ---> composer install..."
composer install && \

echo "Running ---> chmod -R 777 /var/www"
chmod -R 777 /var/www && \

echo "Running---> migrating database"
php /var/www/database/migration.php && \

echo "Running ---> php-fpm"
php-fpm && \

echo "Successfully"

