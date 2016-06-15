#!/bin/bash
while true; do
sleep 2m
timeout 10 /root/edbrowse http://127.0.0.1/index.php
mysql sqli < manage.sql
done
