#!/bin/bash
set -ex

APP_DIR="/var/www/localhost/htdocs/app"

# Crear el archivo . env si no existe y generar la key de laravel.
AUX="$APP_DIR/.env"

if [ ! -f "$AUX" ]; then
  cp $APP_DIR/.env.example $AUX

  php $APP_DIR/artisan key:generate
fi

# Ejecutar Composer para instalar librerias solo si no existe la carpeta "vendor".
AUX="$APP_DIR/vendor"

if [ ! -d "$AUX" ]; then
  /usr/bin/compose install -d $APP_DIR
fi

# Clean old process
rm -fr /run/apache2/httpd.pid

# Starting Apache
/usr/sbin/httpd -D FOREGROUND