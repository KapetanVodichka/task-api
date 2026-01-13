FROM php:8.4-cli

WORKDIR /var/www

RUN apt-get update \
    && apt-get install -y git unzip libzip-dev libonig-dev zlib1g-dev \
    && docker-php-ext-install pdo_mysql mbstring zip \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

ENV COMPOSER_ALLOW_SUPERUSER=1
ENV HOME=/tmp
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
