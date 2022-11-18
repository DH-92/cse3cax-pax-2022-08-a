FROM caddy:2-builder AS caddy-builder
RUN xcaddy build --with github.com/baldinof/caddy-supervisor


FROM devwithlando/php:8.1-fpm-4 AS base
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN curl -sL "https://deb.nodesource.com/setup_16.x" | bash - \
  && apt-get install -y nodejs


FROM base as caddy-up
ARG FPM_CONF_SRC=https://gist.githubusercontent.com/DH-92/bd84c1ac6768f6908d3233f1ae4bbeb1/raw/zz-docker.conf
ARG FPM_CONF_PATH=/usr/local/etc/php-fpm.d/zz-docker.conf
ARG CADDY_SRC=https://gist.githubusercontent.com/DH-92/bd84c1ac6768f6908d3233f1ae4bbeb1/raw/Caddyfile
ARG CADDY_PATH="/etc/caddy/Caddyfile"
ENV CADDY_PATH="${CADDY_PATH}"
ADD --chown=www-data "${CADDY_SRC}" "${CADDY_PATH}"
ADD --chown=www-data "${FPM_CONF_SRC}" "${FPM_CONF_PATH}"
COPY --from=caddy-builder /usr/bin/caddy /usr/local/bin/caddy
RUN chmod +r "${CADDY_PATH}" "${FPM_CONF_PATH}"
RUN caddy validate --config "${CADDY_PATH}" \
  && chown www-data:www-data \
    /var/www/ \
    /var/run/
COPY --chown=www-data entrypoint.sh /usr/local/bin/entrypoint.sh
ENTRYPOINT ["entrypoint.sh"]


FROM caddy-up as dev
ENV XDEBUG_MODE=
ENV APP_ENV=local
ENV SHELL=/bin/bash
USER www-data
HEALTHCHECK --start-period=1m \
  CMD ["./artisan", "schedule:list"]
