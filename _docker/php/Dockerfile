FROM php:8.1-fpm

RUN apt-get update && apt-get install -y \
      apt-utils \
      libpq-dev \
      libpng-dev \
      libzip-dev \
      git \
      zip unzip \
      tesseract-ocr \
      tesseract-ocr-eng \
      tesseract-ocr-ukr \
      tesseract-ocr-script-cyrl && \
      docker-php-ext-install pdo_mysql && \
      docker-php-ext-install bcmath && \
      docker-php-ext-install gd && \
      docker-php-ext-install zip && \
      apt-get clean && \
      rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN chmod +x /usr/local/bin/install-php-extensions && sync && \
    install-php-extensions http

COPY ./_docker/php/php.ini /usr/local/etc/php/conf.d/php.ini

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

WORKDIR /var/www/

COPY ./backend/ .

RUN composer install --prefer-dist --optimize-autoloader \
    && chown -R www-data:www-data ./

CMD cp -n .env.example .env && php-fpm
