FROM php:7.3-apache

# Install composer
ENV COMPOSER_HOME /composer
ENV PATH ./vendor/bin:/composer/vendor/bin:$PATH
ENV COMPOSER_ALLOW_SUPERUSER 1

# NODE LTS
RUN curl -sL https://deb.nodesource.com/setup_12.x | bash -

# Updating and install libraries
RUN apt-get update && apt-get install -y \
        git \
        curl \
        libpng-dev \
        libonig-dev \
        libxml2-dev \
        zip \
        unzip\
        nodejs

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install missing PHP libraries
RUN docker-php-ext-install mysqli pdo pdo_mysql mbstring exif pcntl bcmath gd

# Installing composer
RUN curl -s https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin/ --filename=composer

# Setup working directory
ENV APP_HOME /var/www/html/webapp

WORKDIR $APP_HOME
COPY . $APP_HOME

# Setting ENV APACHE_DOCUMENT_ROOT pointing to public folder
ENV APACHE_DOCUMENT_ROOT $APP_HOME/public

# Setting project public folder into apache config files.
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf
RUN sed -i 's/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

RUN a2enmod rewrite

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

#Exposing port 8080
EXPOSE 80


