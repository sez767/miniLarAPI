FROM php:7.2-fpm

# ADD docker/conf/php.ini /etc/php/7.2/fpm/php.ini

RUN apt-get update \
&& docker-php-ext-install pdo pdo_mysql

RUN apt-get update -y && apt-get install -y libwebp-dev libjpeg62-turbo-dev libpng-dev libonig-dev libxpm-dev \
    libfreetype6-dev
RUN apt-get update && \
    apt-get install -y \
        zlib1g-dev 

RUN docker-php-ext-install mbstring

RUN apt-get install -y libzip-dev
RUN docker-php-ext-install zip

RUN docker-php-ext-configure gd --with-gd --with-webp-dir --with-jpeg-dir \
    --with-png-dir --with-zlib-dir --with-xpm-dir --with-freetype-dir

RUN docker-php-ext-install gd 

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN docker-php-ext-install exif

# Add the entrypoint
COPY ./entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

# RUN chmod -R 775 /var/www/html/public/

ENTRYPOINT ["/entrypoint.sh"]

