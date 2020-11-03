FROM php:7.1.9-apache

RUN docker-php-ext-install mysqli pdo pdo_mysql

## RUN a2ensite /etc/apache2/sites-available/000-default.conf
RUN a2enmod ssl 
RUN service apache2 restart
