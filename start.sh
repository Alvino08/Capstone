#!/bin/bash

# Wait for MySQL
until mysqladmin ping -h"$DB_HOST" --silent; do
  echo "Waiting for database connection..."
  sleep 2
done

# Laravel setup
php artisan migrate --force
php artisan storage:link
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Start PHP-FPM
php-fpm
