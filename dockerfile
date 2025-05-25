FROM php:8.2-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip unzip curl git \
    nodejs npm \
    default-mysql-client

RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy application code
COPY --chown=www-data:www-data ./summarizer/. .

# Copy startup script with ownership
COPY --chown=www-data:www-data start.sh /usr/local/bin/start.sh
RUN chmod +x /usr/local/bin/start.sh

# Expose port 8000
EXPOSE 8000

# Set default command
CMD ["/usr/local/bin/start.sh"]



