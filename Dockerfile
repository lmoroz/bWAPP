FROM php:7.4-apache
RUN apt-get update && apt-get install -y iputils-ping dnsutils
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN a2enmod rewrite
COPY ./bWAPP /var/www/html/bWAPP
RUN chown -R www-data:www-data /var/www/html/bWAPP
RUN chmod 777 /var/www/html/bWAPP/passwords/
RUN chmod 777 /var/www/html/bWAPP/images/
RUN chmod 777 /var/www/html/bWAPP/documents/
RUN chmod 777 /var/www/html/bWAPP/logs/
EXPOSE 8080
