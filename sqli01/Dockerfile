# CMDI01 Dockerfile by BB
#
# VERSION 0.0.1
FROM ubuntu:14.04.4
MAINTAINER BB
WORKDIR /root
ENTRYPOINT ["./setup.sh"]

# Setup apt
RUN apt-get update -y && apt-get upgrade -y

# Install packages
RUN apt-get install -y apache2 php5 curl mysql-server php5-mysql

# Add Level Files to Container
RUN mkdir -p /var/www/html/css
RUN mkdir -p /var/www/html/jquery
ADD css/style.css /var/www/html/css/
ADD jquery/jquery-1.12.1.min.js /var/www/html/jquery/jquery-1.12.1.min.js
ADD sql_statement.txt /var/www/html/sql_statement.txt
ADD setup.sh /root/setup.sh
ADD sqli01.sql /root/sqli01.sql
ADD index.php /var/www/html/index.php
ADD shared_content/admin_infos.php /var/www/html/admin_infos.php
ADD shared_content/dbconnect.php /var/www/html/dbconnect.php
RUN chmod u+x /root/setup.sh

# Clean up
RUN rm /var/www/html/index.html
RUN apt-get clean

# Fix Apache error message because of missing ServerName
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
