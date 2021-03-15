ARG PHP_VER="7.2"
FROM php:${PHP_VER}-cli-buster

FROM php:7.2-cli-buster

WORKDIR /app

RUN apt-get update && \
    apt-get install -y \
        zip \
        curl \
        git && \
    curl -L getcomposer.org/installer | php -- --filename=composer && \
    chmod +x ./composer
