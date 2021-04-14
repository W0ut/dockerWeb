ARG DOCKER_PHP_VERSION

FROM php:${DOCKER_PHP_VERSION}-fpm

MAINTAINER w0ut

RUN apt-get update

RUN apt-get install -y git
RUN apt-get install -y curl
RUN apt-get install -y iputils-ping
RUN apt-get install -y libpq-dev
RUN apt-get install -y apt-utils
RUN apt-get install -y libldb-dev
RUN apt-get install -y libxml2-dev
RUN apt-get install -y libssl-dev
RUN apt-get install -y libmcrypt-dev
RUN apt-get install -y libicu-dev

RUN docker-php-ext-install pgsql pdo pdo_pgsql
RUN docker-php-ext-install fileinfo
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
RUN docker-php-ext-install gettext
RUN docker-php-ext-install session
RUN docker-php-ext-install ftp
RUN docker-php-ext-install sockets
RUN docker-php-ext-install xml

RUN if [ ${DOCKER_PHP_VERSION} != 8.0 ]; then \
    docker-php-ext-install xmlrpc \
    ;fi
RUN docker-php-ext-install xmlwriter  
RUN docker-php-ext-install bcmath  

# ZIP
RUN apt-get install -y libzip-dev
RUN docker-php-ext-install zip

# MONGODB
RUN pecl install mongodb \
    && docker-php-ext-enable mongodb

# LDAP
RUN apt-get install -y libldap2-dev \
    && docker-php-ext-configure ldap \
    --with-libdir=lib/x86_64-linux-gnu \
    && docker-php-ext-install ldap

# XSL
RUN apt-get install -y libxslt-dev
RUN docker-php-ext-install xsl

# SOAP
RUN docker-php-ext-install soap

#ODBC PDO ODBC
RUN apt-get install unixodbc unixodbc-dev -y \
    && docker-php-ext-configure pdo_odbc --with-pdo-odbc=unixODBC,/usr \
    && docker-php-ext-install pdo_odbc

# SQLSRV
RUN pecl install sqlsrv pdo_sqlsrv \
    && docker-php-ext-enable sqlsrv pdo_sqlsrv

# XDEBUG
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

# REDIS EXTENSION
RUN if [ ${DOCKER_PHP_VERSION} == 7.3 ]; then \
    pecl install redis && docker-php-ext-enable redis \
    ;fi

# OPCACHE EXTENSION 
RUN docker-php-ext-configure opcache --enable-opcache \
    && docker-php-ext-install opcache

# COMPOSER
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer \
    && chmod 755 /usr/bin/composer

# CLEAR CACHE
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

USER root

USER www-data:www-data

WORKDIR /var/www/