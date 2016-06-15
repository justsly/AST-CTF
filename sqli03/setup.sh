#!/bin/bash
/usr/sbin/apache2ctl start
/etc/init.d/mysql start
echo "create database sqli" | mysql
mysql sqli < /root/sqli03.sql

secret=$1

tail -f /var/log/apache2/access.log
