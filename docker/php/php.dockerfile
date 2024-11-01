FROM php:8.3-fpm
ARG USERNAME=php
ARG UID=1000
ARG GID=1000

# Basic Setup
RUN apt update -y
RUN apt upgrade -y
RUN apt install sudo nano zip git iputils-ping -y

# Extensions
ADD --chmod=0755 https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
RUN install-php-extensions curl zip sqlite3 mbstring xml pgsql pdo_pgsql intl xdebug bcmath

# XDebug Log
RUN touch /var/log/xdebug.log
RUN chown php:php /var/log/xdebug.log
RUN chmod 664 /var/log/xdebug.log

# Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer

# Docker user
RUN groupadd --gid $GID $USERNAME
RUN useradd --uid $UID --gid $GID -m $USERNAME
RUN echo $USERNAME ALL=\(root\) NOPASSWD:ALL > /etc/sudoers.d/$USERNAME
RUN chmod 0440 /etc/sudoers.d/$USERNAME

USER $USERNAME
WORKDIR /var/www/project
CMD [ "/usr/local/sbin/php-fpm" ]