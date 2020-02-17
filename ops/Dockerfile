FROM php:7.2-apache

ARG DEBIAN_FRONTEND=noninteractive

RUN apt-get update \
 && apt-get install -y \
      gnupg \
      hunspell \
      apache2 -y \
      nano \
      git -y \
      npm -y

RUN curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add -
RUN echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list

RUN apt-get update
RUN apt-get install -y yarn

RUN docker-php-ext-install pdo_mysql \
 && docker-php-ext-enable pdo_mysql

RUN a2enmod rewrite \
 && a2enmod ssl
RUN service apache2 restart

ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_DISABLE_XDEBUG_WARN 1

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN set -ex \
 && pecl install xdebug \
 && docker-php-ext-enable xdebug \
 && echo "[xdebug]"                   | tee -a /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
 && echo "xdebug.idekey=PHPSTORM"     | tee -a /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
 && echo "xdebug.remote_autostart=on" | tee -a /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
 && echo "xdebug.remote_enable=on"    | tee -a /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
 && echo "xdebug.remote_port=9001"    | tee -a /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

ENV XDEBUG_CONFIG "idekey=PHPSTORM"
ENV PHP_IDE_CONFIG "serverName=datascraper.local"

ARG DOCKER_HOST_IP=172.19.0.1
RUN echo "xdebug.remote_host=${DOCKER_HOST_IP}" | tee -a /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# Using docker-machine you might have permission issues for the var directory. Uncomment the following line:
RUN usermod -u 1000 www-data

WORKDIR /var/www/DataScraper

EXPOSE 80
EXPOSE 443
