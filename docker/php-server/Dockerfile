FROM php:7.4-fpm

# Seting working directory
WORKDIR /var/www

# Installing dependencies
RUN apt-get update && apt-get install curl && apt-get install netcat -y

# Clearing cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Installing extensions
RUN docker-php-ext-install pdo_mysql

# Installing composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

#Copying the entry point script
COPY ./docker/php-server/entrypoint.sh /tmp/entrypoint.sh

#Changing file permissions
RUN chmod -R 777 /tmp/entrypoint.sh

#Exposing port 9000
EXPOSE 9000

#Executing the script
ENTRYPOINT ["/tmp/entrypoint.sh"]
