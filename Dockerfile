# Use a imagem PHP oficial com Apache
FROM php:8.3-apache

# Instale dependências do Laravel e algumas extensões PHP necessárias
RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    wget \
    zlib1g-dev \
    libpng-dev \
    && docker-php-ext-install pdo_mysql gd \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

RUN wget -O /usr/local/bin/wait-for-it.sh https://raw.githubusercontent.com/vishnubob/wait-for-it/master/wait-for-it.sh && \
    chmod +x /usr/local/bin/wait-for-it.sh

# Configure as extensões e o Apache
RUN a2enmod rewrite

# Defina o diretório de trabalho
WORKDIR /var/www/html

# Copie o código-fonte da sua aplicação para o contêiner
COPY . .

# Instale as dependências do Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Instale as dependências do Laravel
RUN composer install

# Defina as permissões adequadas
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Exponha a porta do Apache
EXPOSE 8000

# Comando de inicialização do servidor web
CMD ["bash", "-c", "/usr/local/bin/wait-for-it.sh db:3306 -- php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8000"]
