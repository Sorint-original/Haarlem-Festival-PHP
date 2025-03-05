
FROM php:8.2-apache

# Install MongoDB PHP extension
RUN pecl install mongodb && \
    docker-php-ext-enable mongodb

# Optional: Install Composer for dependency management
RUN apt-get update && \
    apt-get install -y git unzip && \
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php composer-setup.php --install-dir=/usr/local/bin --filename=composer && \
    php -r "unlink('composer-setup.php');"