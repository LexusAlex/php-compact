FROM php:7.4-cli-alpine

RUN apk update && apk add autoconf make

RUN docker-php-ext-install pdo_mysql

RUN mv $PHP_INI_DIR/php.ini-development $PHP_INI_DIR/php.ini

RUN apk add unzip

ENV COMPOSER_ALLOW_SUPERUSER 1

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/bin --filename=composer --quiet \
    && composer global require hirak/prestissimo --no-plugins --no-scripts \
    && rm -rf /root/.composer/cache

WORKDIR /app