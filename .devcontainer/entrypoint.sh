#!/bin/bash

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
