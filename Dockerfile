# Gunakan image PHP resmi dengan Apache
FROM php:8.2-apache

# Install ekstensi dan dependency yang dibutuhkan Laravel
RUN apt-get update && apt-get install -y \
    git unzip zip libzip-dev libpng-dev libonig-dev curl \
    && docker-php-ext-install pdo pdo_mysql zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy semua file ke container
COPY . .

# Ubah hak akses
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage

# Aktifkan rewrite module Apache
RUN a2enmod rewrite

# Konfigurasi Apache
COPY ./apache.conf /etc/apache2/sites-available/000-default.conf
