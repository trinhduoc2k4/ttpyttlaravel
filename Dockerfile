FROM php:8.2-cli

WORKDIR /var/www

# install system packages
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libzip-dev \
    zip \
    && docker-php-ext-install pdo_mysql zip

# copy composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# copy project
COPY . .

# install dependencies
RUN composer install --no-dev --optimize-autoloader --no-interaction

# set permission
RUN chmod -R 775 storage bootstrap/cache

# railway uses dynamic port
ENV PORT=8080

EXPOSE 8080

# start laravel server
CMD php artisan serve --host=0.0.0.0 --port=$PORT
