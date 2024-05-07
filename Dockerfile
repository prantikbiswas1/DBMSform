FROM php:latest
RUN docker-php-ext-install pdo_mysql
COPY ./test/ /usr/src/myapp
WORKDIR /usr/src/myapp
CMD [ "php", "./test.php" ]