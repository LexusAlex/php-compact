FROM php:7.4-fpm-alpine

RUN apk add --no-cache autoconf g++ make \
    && pecl install xdebug-3.0.2 \
    && rm -rf /tmp/pear \
    && docker-php-ext-enable xdebug

RUN docker-php-ext-install pdo_mysql

RUN mv $PHP_INI_DIR/php.ini-development $PHP_INI_DIR/php.ini

COPY ./conf.d /usr/local/etc/php/conf.d

WORKDIR /php-compact
