FROM php:8.2-fpm

RUN docker-php-ext-install pdo pdo_mysql && apt-get update && apt-get install -y git unzip curl librdkafka-dev

WORKDIR /var/www/html
COPY ./www /var/www/html

CMD ["php-fpm"]
