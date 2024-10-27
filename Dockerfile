FROM php:7.4-apache

RUN apt-get update && \
    apt-get install -y libssl1.0.0

COPY . /var/www/html