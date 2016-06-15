#!/bin/bash
/usr/sbin/apache2ctl start
/etc/init.d/mysql start
echo "create database sqli" | mysql
mysql sqli < /root/xss01.sql

/root/admin_user.sh
