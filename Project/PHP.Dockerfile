
# Use the official PHP-FPM image
FROM php:fpm

# Install system dependencies
RUN apt-get update && \
    apt-get install -y git unzip libssl-dev pkg-config

# Install PHP extensions for MySQL and MongoDB
RUN docker-php-ext-install pdo pdo_mysql && \
    pecl install mongodb && \
    docker-php-ext-enable mongodb
