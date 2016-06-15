#!/bin/bash
/usr/sbin/apache2ctl start
secret_hash=$(date|md5sum|cut -c 1-16)
mv /var/www/html/secret.php /var/www/html/secret_$secret_hash.php
adduser myuser --gecos "<?php include('/var/www/html/secret_$secret_hash.php'); ?>,,," --disabled-password

secret=$1

tail -f /var/log/apache2/access.log
