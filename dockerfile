# FROM php:8.2-fpm

# # Install deps
# RUN apt-get update && apt-get install -y \
#     build-essential \
#     libpng-dev \
#     libonig-dev \
#     libxml2-dev \
#     zip \
#     unzip \
#     curl \
#     sqlite3 \
#     libsqlite3-dev \
#     git \
#     nodejs \
#     npm

# # Install Composer
# COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# # Setup working dir
# WORKDIR /var/www/html

# # Copy app
# COPY . .

# # Install dependencies
# RUN composer install
# RUN npm install && npm run build

# # Set permissions
# RUN chown -R www-data:www-data /var/www/html

# # Expose port
# EXPOSE 8000
# CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]

FROM php:8.2-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    curl \
    git \
    libzip-dev \
    nodejs \
    npm \
    default-mysql-client

# PHP extensions
RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd zip

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working dir
WORKDIR /var/www/html

# Copy Laravel project from ./summarizer
COPY summarizer/ .

# Install dependencies
RUN composer install
RUN npm install && npm run build

# Permissions
RUN chown -R www-data:www-data /var/www/html

EXPOSE 9000
CMD ["php-fpm"]

