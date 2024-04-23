FROM richarvey/nginx-php-fpm:3.1.6

# Copy the application files into the container
COPY . .

# Set environment variables for image configuration
ENV SKIP_COMPOSER 1
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1

# Set Laravel environment variables
ENV APP_ENV production
ENV APP_DEBUG false
ENV LOG_CHANNEL stderr

# Allow Composer to run as root
ENV COMPOSER_ALLOW_SUPERUSER 1

# Update pecl.php.net channel protocols
RUN pecl channel-update pecl.php.net

# Install required packages and extensions, including imagick
RUN apk add --no-cache autoconf g++ make imagemagick imagemagick-dev \
    && pecl install imagick \
    && echo "extension=imagick.so" > /usr/local/etc/php/conf.d/imagick.ini \
    && docker-php-ext-enable imagick \
    && apk del autoconf g++ make \
    && rm -rf /var/cache/apk/* \
    && chmod +x /var/www/html/scripts/00-laravel-deploy.sh \
    && ls -l /var/www/html/scripts/00-laravel-deploy.sh


# Set the default command to start the container
CMD ["/start.sh"]
