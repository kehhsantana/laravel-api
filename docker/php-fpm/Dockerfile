FROM phpdockerio/php73-fpm:latest
WORKDIR /var/www

# Install git
RUN apt-get update \
    && apt-get -y --no-install-recommends install  php7.2-mysql \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*