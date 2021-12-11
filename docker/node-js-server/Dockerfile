FROM node:alpine
WORKDIR /var/www
ADD ./docker/node-js-server/entrypoint.sh /tmp/entrypoint.sh
RUN chmod -R 777 /tmp/entrypoint.sh
EXPOSE 3000
CMD ["/tmp/entrypoint.sh"]
