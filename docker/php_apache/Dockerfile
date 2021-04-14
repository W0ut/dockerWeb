FROM php:7.4-apache

MAINTAINER w0ut

RUN chmod 777 -R /var/www/html/

RUN apt-get update
RUN apt-get install -y curl
RUN apt-get install -y libpq-dev
RUN apt-get install -y iputils-ping
RUN apt-get install -y apt-utils
RUN apt-get install -y libldb-dev
RUN apt-get install -y libxml2-dev
RUN apt-get install -y libssl-dev
RUN apt-get install -y libmcrypt-dev
RUN apt-get install -y libicu-dev

RUN a2enmod ssl && a2enmod rewrite \
    && a2enmod headers && a2enmod ldap

RUN docker-php-ext-install pgsql pdo pdo_pgsql
RUN docker-php-ext-install fileinfo
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
RUN docker-php-ext-install gettext
RUN docker-php-ext-install session
RUN docker-php-ext-install ftp
RUN docker-php-ext-install sockets
RUN docker-php-ext-install xml
RUN docker-php-ext-install xmlrpc
RUN docker-php-ext-install xmlwriter  

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
RUN pecl install redis-4.0.1 && docker-php-ext-enable redis

# COMPOSER
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer \
    && chmod 755 /usr/bin/composer

# OPCACHE EXTENSION 
RUN docker-php-ext-configure opcache --enable-opcache \
    && docker-php-ext-install opcache

RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"