FROM php:8.1-rc-fpm-alpine3.16

# Up the PHP memory limit so --type-coverage tests do not exhaust memory
RUN echo 'memory_limit = 512M' >> /usr/local/etc/php/conf.d/docker-php-memlimit.ini;

RUN apk add --update linux-headers \
    && apk --no-cache add pcre-dev ${PHPIZE_DEPS} \ 
    # && pecl install xdebug-3.2.2\
    && pecl install pcov-1.0.11\
    ## && docker-php-ext-enable xdebug \
    && docker-php-ext-enable pcov \
    && apk del pcre-dev ${PHPIZE_DEPS}

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql

# Setting xdebug mode
RUN echo pcov.mode=coverage > /usr/local/etc/php/conf.d/pcov.ini 
