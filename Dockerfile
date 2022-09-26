# syntax=docker/dockerfile:1
ARG PHP_VERSION=8.1


FROM caddy:2-builder AS caddy-builder
RUN xcaddy build --with github.com/baldinof/caddy-supervisor


FROM php:${PHP_VERSION}-fpm AS base
RUN apt-get update \
  && apt-get install -y \
    procps \
    libzip-dev \
    libpng-dev \
  && docker-php-ext-install \
    gd \
    opcache \
    pdo_mysql \
    zip \
  && docker-php-ext-configure zip \
  && docker-php-ext-install zip


FROM base as lando
ENV XDEBUG_MODE=
ENV APP_ENV=local
RUN apt-get -y install \
    zip \
  && pecl install \
  xdebug


FROM base as caddy-up
ARG FPM_CONF_SRC=https://gist.githubusercontent.com/DH-92/bd84c1ac6768f6908d3233f1ae4bbeb1/raw/zz-docker.conf
ARG FPM_CONF_PATH=/usr/local/etc/php-fpm.d/zz-docker.conf
ARG CADDY_SRC=https://gist.githubusercontent.com/DH-92/bd84c1ac6768f6908d3233f1ae4bbeb1/raw/Caddyfile
ARG CADDY_PATH="/etc/caddy/Caddyfile"
ENV CADDY_PATH="${CADDY_PATH}"
ADD --chown=www-data "${CADDY_SRC}" "${CADDY_PATH}"
ADD --chown=www-data "${FPM_CONF_SRC}" "${FPM_CONF_PATH}"
COPY --link --from=caddy-builder /usr/bin/caddy /usr/local/bin/caddy
RUN caddy validate -config "${CADDY_PATH}" \
  && chown www-data:www-data \
    /var/www/ \
    /var/run/
COPY --chown=www-data ./entrypoint.sh /usr/local/bin/entrypoint.sh
ENTRYPOINT ["entrypoint.sh"]


FROM caddy-up as dev
COPY --link --from=composer:latest /usr/bin/composer /usr/bin/composer
ENV XDEBUG_MODE=
ENV APP_ENV=local
RUN pecl install \
  xdebug
USER www-data


FROM base AS composer-up
RUN apt-get clean -y\
  && rm -rf /var/lib/apt/lists/*
COPY --link --from=composer:latest /usr/bin/composer /usr/bin/composer
COPY composer.json composer.lock ./
RUN composer install \
  --no-interaction \
  --no-dev \
  --no-plugins \
  --no-scripts \
  --optimize-autoloader


FROM node:16-alpine AS vite-build
WORKDIR /var/www/html
COPY package*.json ./
RUN npm install
COPY resources vite.config.js ./
RUN npm run build


FROM caddy-up AS final
COPY --from=composer-up \
  /var/www/html/vendor vendor
COPY --from=vite-build \
  --chown=www-data  \
  /var/www/html/public/build public/build
COPY --chown=www-data . .
RUN php artisan package:discover --ansi
USER www-data
HEALTHCHECK --start-period=1m \
  CMD ["./artisan", "schedule:list"]
