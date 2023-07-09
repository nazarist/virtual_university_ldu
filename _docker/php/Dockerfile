FROM php:8.1-fpm

RUN apt-get update && apt-get install -y \
      apt-utils \
      libpq-dev \
      libpng-dev \
      libzip-dev \
      zip unzip \
      git && \
      docker-php-ext-install pdo_mysql && \
      docker-php-ext-install bcmath && \
      docker-php-ext-install gd && \
      docker-php-ext-install zip && \
      apt-get clean && \
      rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

COPY ./_docker/php/php.ini /usr/local/etc/php/conf.d/php.ini

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

COPY  ./_docker/php/command.sh /command.sh

RUN chmod +x /command.sh \
    && mkdir /var/www/backend/

WORKDIR /build_dir

COPY ./backend/ .

RUN composer update --prefer-dist --no-dev --optimize-autoloader --no-interaction

WORKDIR /var/www/backend

CMD cp -r /build_dir/vendor/ /var/www/backend/ \
    && cp -n /var/www/backend/.env.example /var/www/backend/.env \
    && php-fpm