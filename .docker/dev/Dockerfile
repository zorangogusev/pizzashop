FROM debian:10.3

# Install for php8.0
RUN apt-get update && apt-get -y upgrade
RUN apt update && apt install lsb-release ca-certificates apt-transport-https software-properties-common -y
RUN echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" | tee /etc/apt/sources.list.d/sury-php.list
RUN apt install -y wget
RUN apt-get install -y gnupg
RUN wget -qO - https://packages.sury.org/php/apt.gpg | apt-key add -

# Install apache, PHP, and supplimentary programs. openssh-server, curl, and lynx-cur are for debugging the container.
RUN apt-get update && apt-get -y upgrade && apt-get -y install \
    apache2 php8.0 php8.0-mysql libapache2-mod-php8.0 curl lynx git php8.0-curl php-xdebug php8.0-zip php8.0-mbstring php8.0-xml php8.0-gd php8.0-memcache php8.0-intl php-pear php8.0-dev php8.0-redis php8.0-bcmath zip unzip rsync nano ssh supervisor

RUN apt-get update && apt-get -y upgrade && apt-get -y install \
    gcc make autoconf libc-dev pkg-config libmcrypt-dev

#RUN pecl install mcrypt-1.0.3
#RUN bash -c "echo extension=/usr/lib/php/20180731/mcrypt.so > /etc/php/8.0/cli/conf.d/20-mcrypt.ini"
#RUN bash -c "echo extension=/usr/lib/php/20180731/mcrypt.so > /etc/php/8.0/apache2/conf.d/20-mcrypt.ini"

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Enable apache mods.
RUN a2enmod php8.0
RUN a2enmod rewrite

# Update the PHP.ini file, enable <? ?> tags and quieten logging.
RUN sed -i "s/short_open_tag = Off/short_open_tag = On/" /etc/php/8.0/apache2/php.ini
RUN sed -i "s/error_reporting = .*$/error_reporting = E_ERROR | E_WARNING | E_PARSE/" /etc/php/8.0/apache2/php.ini

# Manually set up the apache environment variables
ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data
ENV APACHE_LOG_DIR /var/log/apache2
ENV APACHE_LOCK_DIR /var/lock/apache2
ENV APACHE_PID_FILE /var/run/apache2.pid

# APACHE PHP Project settings
ADD .docker/dev/20-xdebug.ini /etc/php/8.0/apache2/conf.d/20-xdebug.ini
ADD .docker/dev/20-xdebug.ini /etc/php/8.0/cli/conf.d/20-xdebug.ini

# enable the site
ADD .docker/dev/pizzashop.test.conf /etc/apache2/sites-available/pizzashop.test.conf
RUN a2ensite pizzashop.test.conf

# Expose apache.
EXPOSE 80

# SSH
EXPOSE 22
RUN mkdir /var/run/sshd
RUN sed -i 's/PermitRootLogin prohibit-password/PermitRootLogin yes/' /etc/ssh/sshd_config
RUN sed -i 's/#PermitRootLogin yes/PermitRootLogin yes/' /etc/ssh/sshd_config
RUN echo "root:zoran" | chpasswd

# Supervisor

RUN mkdir -p /var/log/supervisor
COPY .docker/dev/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

#PROJECT SPECIFIC
ENV XDEBUG_CONFIG "idekey=PHPSTORM"
# COPY ENV variables to etc
RUN env | grep = >> /etc/environment

# By default start up apache in the foreground, override with /bin/bash for interative.
#CMD /usr/sbin/apache2ctl -D FOREGROUND
#CMD /usr/sbin/sshd -D
CMD /usr/bin/supervisord
