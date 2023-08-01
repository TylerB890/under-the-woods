FROM php:8.1-rc-fpm-alpine3.16

RUN docker-php-ext-install pdo pdo_mysql