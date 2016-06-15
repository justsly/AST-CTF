# Heartbleed Dockerfile by BB
#
# VERSION 0.0.1
FROM ubuntu:12.04
MAINTAINER BB
WORKDIR /root
ENTRYPOINT ["./setup.sh"]

ADD setup.sh /root/setup.sh
ADD push_flag_into_servermem.sh /root/push_flag_into_servermem.sh
RUN chmod u+x /root/*.sh
ADD index.html /var/www/index.html
ADD login.php /var/www/login.php
RUN mkdir /var/www/pics
ADD pics/ssl.png /var/www/pics/ssl.png

RUN echo "deb http://de.archive.ubuntu.com/ubuntu precise main restricted universe multiverse" >> /etc/apt/sources.list
RUN echo "#deb-src http://de.archive.ubuntu.com/ubuntu precise main restricted universe multiverse" >> /etc/apt/sources.list

RUN echo "deb http://de.archive.ubuntu.com/ubuntu precise-updates main restricted universe multiverse" >> /etc/apt/sources.list
RUN echo "#deb-src http://de.archive.ubuntu.com/ubuntu precise-updates main restricted universe multiverse" >> /etc/apt/sources.list

RUN echo "deb http://de.archive.ubuntu.com/ubuntu precise-security main restricted universe multiverse" >> /etc/apt/sources.list
RUN echo "#deb-src http://de.archive.ubuntu.com/ubuntu precise-security main restricted universe multiverse" >> /etc/apt/sources.list

RUN echo "deb http://de.archive.ubuntu.com/ubuntu precise-backports main restricted universe multiverse" >> /etc/apt/sources.list
RUN echo "#deb-src http://de.archive.ubuntu.com/ubuntu precise-backports main restricted universe multiverse" >> /etc/apt/sources.list

RUN apt-get update
RUN apt-get install -y --force-yes openssl=1.0.1-4ubuntu3 libssl1.0.0=1.0.1-4ubuntu3
RUN apt-get install -y apache2 php5 curl
RUN a2enmod ssl
RUN a2ensite default-ssl
RUN service apache2 reload
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
