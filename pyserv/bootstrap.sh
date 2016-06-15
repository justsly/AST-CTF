#!/bin/sh

nohup python /var/ftp/server.py &
vsftpd /etc/vsftpd/vsftpd-anon.conf
