FROM php:7-apache

RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN a2enmod ssl rewrite headers
RUN service apache2 restart
