FROM phpdockerio/php:8.4-fpm
WORKDIR "/application"

RUN apt-get update \
    && apt-get -y --no-install-recommends install \
        php8.4-bcmath \
        php8.4-bz2 \
        php8.4-mcrypt \
        php8.4-mysql \
        php8.4-xmlrpc \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*
