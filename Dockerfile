# Use an official PHP image as the base
FROM php:7.4-fpm

# Set the working directory
WORKDIR /var/www/html

# Copy the composer files to the image
COPY composer.json composer.lock ./

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libzip-dev \
    zip \
    && docker-php-ext-install zip \
    && docker-php-ext-install pdo_mysql

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install Laravel dependencies
RUN composer install

# Copy the remaining files to the image
COPY . .

# Set the correct permissions
RUN chown -R www-data:www-data /var/www/html

# Start the PHP FPM process
CMD ["php-fpm"]
