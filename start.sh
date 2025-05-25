#!/bin/bash

# Exit on error
set -e

# Check .env file
if [ ! -f .env ]; then
  echo ".env file is missing!"
  exit 1
fi

# Wait for MySQL with timeout
MAX_TRIES=30
TRIES=0

until mysqladmin ping -h"$DB_HOST" --silent; do
  if [ "$TRIES" -ge "$MAX_TRIES" ]; then
    echo "Database connection timeout."
    exit 1
  fi
  echo "Waiting for database connection..."
  TRIES=$((TRIES+1))
  sleep 2
done

# Optional: Composer & NPM (comment out if done in Dockerfile)
composer install --no-interaction --prefer-dist --optimize-autoloader
npm install
npm run build

chown -R www-data:www-data storage bootstrap/cache


# Laravel setup
php artisan migrate --force
php artisan storage:link
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Start PHP-FPM
php-fpm

