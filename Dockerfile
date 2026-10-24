FROM php:8.4-apache
RUN apt-get update && apt-get install -y iputils-ping dnsutils libpng-dev libfreetype-dev libldap-dev
RUN docker-php-ext-configure gd --with-freetype
RUN docker-php-ext-install mysqli pdo pdo_mysql gd ldap
RUN a2enmod rewrite include
COPY ./apache2/bwapp-docker.conf /etc/apache2/conf-available/bwapp.conf
RUN a2enconf bwapp
COPY ./php/bwapp.ini /usr/local/etc/php/conf.d/bwapp.ini
COPY ./bWAPP /var/www/html/bWAPP
COPY ./evil /var/www/html/evil
COPY --chown=www-data:www-data ./crossdomain.xml ./ClientAccessPolicy.xml /var/www/html/
RUN chown -R www-data:www-data /var/www/html/bWAPP
RUN chmod 777 /var/www/html/bWAPP/passwords/
RUN chmod 777 /var/www/html/bWAPP/images/
RUN chmod 777 /var/www/html/bWAPP/documents/
RUN chmod 777 /var/www/html/bWAPP/logs/
EXPOSE 8080
