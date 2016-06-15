# pyserv by RV
#
# VERSION 0.0.1
FROM ubuntu:12.04
MAINTAINER RV
WORKDIR /root

RUN mkdir /var/ftp
RUN mkdir -p /var/run/vsftpd/empty

ADD server.py /var/ftp
ADD proof.txt /var/ftp
ADD README /var/ftp
ADD bootstrap.sh /root
ADD vsftpd-anon.conf /etc/vsftpd/

RUN chown root /var/ftp/proof.txt
RUN chmod 600 /var/ftp/proof.txt
RUN chmod u+x /root/*.sh

RUN apt-get update && apt-get install -y --force-yes vsftpd

CMD ["/root/bootstrap.sh"]
