FROM nginx:1.19-alpine

# Seting working directory
WORKDIR /var/www

# Installing runtime env and package manager
RUN apk add --no-cache nodejs npm

#Adding the entrypoint script
ADD ./docker/nginx-client-server/entrypoint.sh /tmp/entrypoint.sh

#Changing file permissions
RUN chmod -R 777 /tmp/entrypoint.sh

#Executing the script
CMD ["/tmp/entrypoint.sh"]