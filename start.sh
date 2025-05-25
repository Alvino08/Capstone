#!/bin/bash

# Wait for MySQL to be ready
until mysqladmin ping -h"$DB_HOST" --silent; do
  echo "Waiting for database connection..."
  sleep 2
done

# Laravel setup
php artisan migrate --force
php artisan storage:link

# Run php-fpm
php-fpm
