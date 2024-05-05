FROM php:8.1

## Set working directory
ARG APP_DIR=/var/www

## Versão da Lib do Redis para PHP
ARG REDIS_LIB_VERSION=5.3.7

# Instala dependências do PHP
RUN apt-get update && apt-get install -y \
    zlib1g-dev \
    libzip-dev \
    unzip \
    libpng-dev \
    libpq-dev \
    libxml2-dev \
    libwebp-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libxpm-dev \
    libfreetype6-dev \
    && rm -rf /var/lib/apt/lists/*

# Instala extensões PHP
RUN docker-php-ext-install mysqli pdo pdo_mysql pdo_pgsql pgsql session xml bcmath zip iconv simplexml pcntl gd fileinfo

# Habilita instalação do Redis
RUN pecl install redis-${REDIS_LIB_VERSION} \
    && docker-php-ext-enable redis

# Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Define o diretório de trabalho
WORKDIR ${APP_DIR}

# Copia os arquivos do aplicativo
COPY . .

# Instala as dependências do Composer
RUN composer install
