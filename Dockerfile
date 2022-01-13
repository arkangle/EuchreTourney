FROM ubuntu:20.04

ARG USERID=0

RUN apt-get update \
&& DEBIAN_FRONTEND=noninteractive apt-get install -y \
software-properties-common \
&& add-apt-repository ppa:ondrej/php -y \
&& apt-get update \
&& DEBIAN_FRONTEND=noninteractive apt-get upgrade -y \
&& DEBIAN_FRONTEND=noninteractive apt-get install -y \
php8.0-fpm \
php8.0-cli \
php8.0-mysql \
php8.0 \
composer \
&& apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* \
&& adduser --disabled-password --gecos "" --uid $USERID app

COPY conf /tmp/conf
COPY entrypoint.sh /entrypoint.sh
RUN cd /tmp/conf \
&& mv php-fpm.conf /etc/php/8.0/fpm/ \
&& mv php.ini /etc/php/8.0/fpm/ \
&& mkdir /run/php && chown app:app /run/php \
&& mv php-pool-www.conf /etc/php/8.0/fpm/pool.d/www.conf

USER app
WORKDIR "/opt/app"
ENTRYPOINT ["/entrypoint.sh"]
