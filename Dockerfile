FROM php:8.5-apache-trixie

RUN apt-get update \
    && apt-get install -y \
        git \
        unzip \
        libonig-dev \
    && docker-php-ext-install mbstring \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html