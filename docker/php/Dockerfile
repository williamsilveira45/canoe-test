FROM php:8.2-fpm

# Install PHP extensions
RUN apt-get update && apt-get install -y librdkafka-dev zip unzip git netcat-openbsd
RUN docker-php-ext-install pdo_mysql

# Install the kafka package
RUN if ! pecl list | grep -q rdkafka; then pecl install rdkafka-5.0.2 && docker-php-ext-enable rdkafka; fi

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install the kafka package for laravel
WORKDIR /var/www
ENV COMPOSER_ALLOW_SUPERUSER=1
COPY ./start.sh /start.sh
RUN chmod +x /start.sh
