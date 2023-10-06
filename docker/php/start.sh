#!/bin/sh

# Waiting for database response to migrate
until nc -z -v -w30 mysql 3306
do
  echo "Waiting for database connection..."
  sleep 1
done

composer install

# exec migration
php artisan migrate --seed

# start the php fpm process
php-fpm
