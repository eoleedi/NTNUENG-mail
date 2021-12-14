FROM php:8.0.12-fpm-bullseye

RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN a2enmod ssl rewrite headers
RUN service apache2 restart
