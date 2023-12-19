# Use bitnami/php-fpm as base image
FROM bitnami/php-fpm:8.1.26

RUN curl -sSL https://phar.phpunit.de/phpunit.phar -o /usr/local/bin/phpunit && chmod +x /usr/local/bin/phpunit

RUN apt-get update && apt-get install php-xdebug -y

RUN echo "zend_extension=xdebug.so" >> /opt/bitnami/php/etc/php.ini
RUN echo "xdebug.mode=debug, develop, trace, profile, coverage" >> /opt/bitnami/php/etc/php.ini
RUN echo "xdebug.start_with_request=yes" >> /opt/bitnami/php/etc/php.ini
RUN echo "xdebug.discover_client_host=0" >> /opt/bitnami/php/etc/php.ini
RUN echo "xdebug.client_host=host.docker.internal" >> /opt/bitnami/php/etc/php.ini
RUN echo "xdebug.client_port=9003" >> /opt/bitnami/php/etc/php.ini
RUN echo "xdebug.idekey=VSCODE" >> /opt/bitnami/php/etc/php.ini
