FROM php:8.2-fpm

RUN apt-get update && apt-get install -y unzip git \
    && docker-php-ext-install pdo pdo_mysql

WORKDIR /var/www/html
COPY ./www /var/www/html

CMD ["php-fpm"]
