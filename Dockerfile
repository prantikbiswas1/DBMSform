FROM php:7.4.2-apache

COPY . /var/www/html


RUN apt-get update && apt-get install -y \
    libjpeg-dev \
    libpng-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-jpeg --with-freetype \
    && docker-php-ext-install -j$(nproc) gd

RUN docker-php-ext-install gd

RUN docker-php-ext-install mysqli pdo pdo_mysql
    


# Expose port 80
EXPOSE 80