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
php8.0-xdebug \
php8.0-xml \
php8.0-mbstring \
php8.0-curl \
php8.0 \
wget \
unzip \
&& wget -O composer-setup.php https://getcomposer.org/installer \
&& php composer-setup.php --install-dir=/usr/bin --filename=composer \
&& rm composer-setup.php \
&& apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* \
&& adduser --disabled-password --gecos "" --uid $USERID app

COPY conf /tmp/conf
COPY entrypoint.sh /entrypoint.sh
RUN cd /tmp/conf \
&& mv php-fpm.conf /etc/php/8.0/fpm/ \
&& mv php.ini /etc/php/8.0/fpm/ \
&& mkdir /run/php && chown app:app /run/php \
&& mv php-pool-www.conf /etc/php/8.0/fpm/pool.d/www.conf

ENV PATH "/opt/app/vendor/bin:/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin"
USER app
WORKDIR "/opt/app"
ENTRYPOINT ["/entrypoint.sh"]
