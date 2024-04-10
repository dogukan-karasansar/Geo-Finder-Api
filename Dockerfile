# Base image
FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www/html

# Install dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libpq-dev \
    && docker-php-ext-install pdo_mysql pdo_pgsql zip

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY composer.lock composer.json /var/www/html/

RUN composer install --no-scripts --no-autoloader

COPY . /var/www/html

RUN composer dump-autoload

EXPOSE 9000
CMD ["php-fpm"]
