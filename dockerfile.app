FROM alpine:3.8

COPY ./.docker /.docker

RUN set -ex \
  && apk update \
  && apk add --no-cache \
     bash nano curl wget zip unzip dos2unix \
     apache2 php7 php7-apache2 \
     php7-apcu \
     php7-bcmath \
     php7-bz2 \
     php7-cli \
     php7-common \
     php7-ctype \
     php7-curl \
     php7-dom \
     php7-exif \
     php7-fileinfo \
     php7-gd \
     php7-gettext \
     php7-iconv \
     php7-imap \
     php7-intl \
     php7-json \
     php7-ldap \
     php7-mbstring \
     php7-mcrypt \
     php7-openssl \
     php7-pdo \
     php7-pdo_dblib \
     php7-pdo_mysql \
     php7-pdo_odbc \
     php7-pdo_pgsql \
     php7-phar \
     php7-redis \
     php7-session \
     php7-simplexml \
     php7-tokenizer \
     php7-xml \
     php7-xmlreader \
     php7-xmlrpc \
     php7-xmlwriter \
     php7-zip \
     php7-zlib \
  && mkdir /run/apache2 \
  && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=compose \
  && cp /.docker/configs/vhost.conf /etc/apache2/conf.d/vhost.conf \
  && cp /.docker/configs/php.ini /etc/php7/php.ini \
  && cp /.docker/scripts/docker-entrypoint.sh /docker-entrypoint.sh \
  && dos2unix /docker-entrypoint.sh \
  && chmod +x /docker-entrypoint.sh \
  && rm -fr /var/cache/apk/*

WORKDIR /var/www/localhost/htdocs/app

ENTRYPOINT ["bash","/docker-entrypoint.sh"]