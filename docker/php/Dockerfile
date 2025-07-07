FROM php:7.0-fpm-alpine

RUN apk add --update --no-cache libgd libpng-dev libjpeg-turbo-dev freetype-dev libmcrypt-dev libltdl \
    && docker-php-ext-configure mcrypt \
    && docker-php-ext-install mcrypt \
    && docker-php-ext-install -j$(nproc) gd

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer self-update --2.2
# Add our PHP config
COPY ./docker/php/php.ini /usr/local/etc/php/conf.d/custom.ini

# Set working directory
ENV HOME=/var/www
WORKDIR $HOME

ADD ../../composer.json $HOME
ADD ../../lib $HOME/lib
ADD ../../extlib $HOME/extlib
RUN composer install

# What command to run
CMD ["php-fpm"]

# Document that we use port 9000
EXPOSE 9000