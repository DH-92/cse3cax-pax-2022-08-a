#!/bin/bash

throw(){
    echo "$1" >&2
    exit
}

safeSource(){
    [[ -f "$1" ]] && source "$1"
}

set -a
curenv="$(declare -p -x)"
for secret in /run/secrets/*.env; do source "${secret}"; done
safeSource "/var/www/html/.env"
safeSource "/var/www/html/.env.${APP_ENV}"
eval "${curenv}"
set +a

if [[ "${APP_ENV}" == "local" ]]; then
    composer install
    if [[ -z "${APP_KEY}" ]]; then
        if [ ! -f /var/www/html/.env ]; then
            echo "APP_KEY=" > /var/www/html/.env
            sleep 1
        fi
        php artisan key:generate
    fi
else
    [[ -n "${APP_KEY}" ]] || throw "-- APP_KEY is missing or invalid - exiting"
    php artisan optimize \
        && php artisan event:cache \
        && php artisan view:cache \
        || throw "-- failed to build caches - exiting"
fi

php artisan storage:link
php artisan migrate --force || throw "-- failed to handle DB migrations - exiting"

if [[ $# -eq 0 ]]; then
    exec /usr/local/bin/caddy run --config "${CADDY_PATH}"
fi

# To start container without caddy use below in compose
# commands: ['php-fpm']

# if first arg is a switch add php-fpm infront instead
if [[ "${1#-}" != "$1" ]]; then
    set -- php-fpm "$@"
fi

exec "$@"
