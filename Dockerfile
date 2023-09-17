FROM php:7.0-fpm-alpine

RUN apk add --update --no-cache libgd libpng-dev libjpeg-turbo-dev freetype-dev libmcrypt-dev libltdl \
    && docker-php-ext-configure mcrypt \
    && docker-php-ext-install mcrypt \
    && docker-php-ext-install -j$(nproc) gd

ENV HOME=/usr/app
RUN mkdir -p $HOME
WORKDIR $HOME

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

ADD composer.json $HOME
ADD lib $HOME/lib
ADD extlib $HOME/extlib
RUN composer install

EXPOSE 8080

CMD [ "php", "-S", "0.0.0.0:8080", "-t", "demo1" ]