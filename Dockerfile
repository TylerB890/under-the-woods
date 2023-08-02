FROM php:8.1-rc-fpm-alpine3.16

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql