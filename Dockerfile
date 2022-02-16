ARG PHP_VER="7.2"
FROM dezar/php-cli:${PHP_VER} as builder

COPY . /app

RUN ./composer update && \
    rm ./composer

FROM php:${PHP_VER}-alpine

WORKDIR /app
COPY --from=builder /app /app

ENTRYPOINT [ "/app/fixer" ]
