# Gunakan image PHP + Apache
FROM php:8.2-apache

# Install dependensi untuk Laravel
RUN apt-get update && apt-get install -y \
    git unzip zip libzip-dev libpng-dev libonig-dev curl \
    && docker-php-ext-install pdo pdo_mysql zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory Laravel
WORKDIR /var/www/html

# Copy semua file Laravel ke dalam container
COPY . .

# Ubah hak akses folder storage dan bootstrap
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage \
    && chmod -R 755 /var/www/html/bootstrap/cache

# Aktifkan mod_rewrite Apache
RUN a2enmod rewrite

# Salin konfigurasi Apache
COPY apache.conf /etc/apache2/sites-available/000-default.conf

# Install dependensi + generate key Laravel saat build
RUN composer install --no-interaction --prefer-dist --optimize-autoloader && \
    cp .env.example .env && \
    php artisan key:generate

# Port default Railway
EXPOSE 80

# Jalankan Apache
CMD ["apache2-foreground"]
