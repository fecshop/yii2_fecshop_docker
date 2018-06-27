FROM php:7.1.13-fpm

# Install modules
RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        librabbitmq-dev \
        libssh-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng12-dev \
        libicu-dev \
        libxml2-dev \
        libssl-dev \
        git \
        wget \
        ssh \
        libpcre3-dev \
        --no-install-recommends       
       
RUN docker-php-ext-install mcrypt zip intl mbstring mysqli pdo_mysql exif xmlrpc \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install gd


RUN pecl install -o -f oauth mongodb amqp \
    && rm -rf /tmp/pear

RUN docker-php-ext-enable mongodb oauth amqp

RUN apt-get purge -y g++ \
    && apt-get autoremove -y \
    && rm -r /var/lib/apt/lists/* \
    && rm -rf /tmp/*

RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer \
    && chmod +x /usr/local/bin/composer

RUN composer global require "fxp/composer-asset-plugin:^1.4.0"

RUN usermod -u 1000 www-data

EXPOSE 9000
CMD ["php-fpm"]
