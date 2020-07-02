FROM phpdockerio/php73-fpm:latest
WORKDIR "/application"

## Install php7.3 extension
RUN apt-get update -yqq \
    && apt-get install -yqq \
    php7.3-pgsql \
	php7.3-mysql \
	php7.3-opcache \
	php7.3-common \
	php7.3-mbstring \
	php7.3-soap \
	php7.3-cli \
	php7.3-intl \
	php7.3-json \
	php7.3-xsl \
	php7.3-imap \
	php7.3-ldap \
	php7.3-curl \
	php7.3-gd  \
	php7.3-dev \
    php7.3-fpm \
    php7.3-bcmath

RUN apt-get install pkg-config \
    && apt-get install -y -q --no-install-recommends \
    ssmtp

RUN apt-get install -yqq git


RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && composer global require laravel/installer

ENV PATH "$PATH:/root/.composer/vendor/bin"

COPY ./php-ini-overrides.ini /etc/php/7.3/fpm/php.ini


