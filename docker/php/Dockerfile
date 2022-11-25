FROM php:8.1.0-fpm as php

COPY ./docker/php/php.ini /usr/local/etc/php/conf.d/docker-php-config.ini

RUN apt-get update && apt-get install -y

RUN apt-get update && apt-get install -y --no-install-recommends \
      libzip-dev \
    && docker-php-ext-install \
        zip \
        mysqli \
        pdo pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && ln -s $(composer config --global home) /root/composer

WORKDIR /var/www/symfony61

COPY . ./

RUN composer install