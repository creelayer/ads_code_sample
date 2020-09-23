FROM php:7.4-fpm-alpine AS app
COPY www /var/www/app/
WORKDIR /var/www/app/

RUN set -ex \
  && apk --no-cache add \
    postgresql-dev

RUN docker-php-ext-install pdo pdo_pgsql

COPY php.conf /usr/local/etc/php-fpm.d/www.conf
COPY php.ini /usr/local/etc/php/conf.d
RUN rm /usr/local/etc/php-fpm.d/zz-docker.conf

RUN addgroup -g 1000 -S www
RUN adduser -u 1000 -S -G www www

#RUN mkdir /socket && chown -Rf notuser:notuser /socket

USER www

EXPOSE 9000
CMD ["php-fpm", "--nodaemonize"]

