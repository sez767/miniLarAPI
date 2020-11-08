#!/usr/bin/env bash

composer install --ignore-platform-reqs
php artisan config:clear
php artisan cache:clear

php artisan migrate

docker-compose exec fpm chmod -R 777 /var/www/html/
docker-php-entrypoint php-fpm
