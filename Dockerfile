FROM php:8.3-apache

RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    wget \
    zlib1g-dev \
    libpng-dev \
    libpq-dev \
    postgresql-client \
    && docker-php-ext-install pdo_mysql pdo_pgsql gd \
    && docker-php-ext-install pdo_mysql gd \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

RUN wget -O /usr/local/bin/wait-for-it.sh https://raw.githubusercontent.com/vishnubob/wait-for-it/master/wait-for-it.sh && \
    chmod +x /usr/local/bin/wait-for-it.sh

RUN a2enmod rewrite

WORKDIR /var/www/html

COPY . .

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN composer install

RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 8000

CMD ["bash", "-c", "/usr/local/bin/wait-for-it.sh db:3306 -- php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8000"]
