#!/bin/bash
mv /var/www/html/secret.php /var/www/html/thats_the_secret_$(date|md5sum|cut -c 1-16).php
/usr/sbin/apache2ctl start
secret=$1

tail -f /var/log/apache2/access.log
