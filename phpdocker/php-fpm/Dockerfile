FROM phpdockerio/php:8.0-fpm
WORKDIR "/structured-mvc-php-poo"

RUN apt-get update \
    && apt-get -y --no-install-recommends install \
        php8.0-memcached \ 
        php8.0-mysql \ 
        php8.0-redis \ 
        php8.0-xdebug \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*
