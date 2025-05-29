# FROM php:8.3-fpm

# RUN apt-get update && apt-get install -y \
#     build-essential \
#     libpng-dev \
#     libjpeg62-turbo-dev \
#     libfreetype6-dev \
#     libonig-dev \
#     libxml2-dev \
#     zip \
#     unzip \
#     curl \
#     git \
#     nano \
#     && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# WORKDIR /var/www

# COPY . /var/www

# RUN chown -R www-data:www-data /var/www \
#     && chmod -R 755 /var/www

# EXPOSE 9000
# CMD ["php-fpm"]
