FROM        centos:7
MAINTAINER  SEC

# Install packages
RUN         yum install epel-release -y
RUN         yum install python-pip ImageMagick-6.7.8.9-10.el7 nmap-ncat -y

ADD	    proof.txt /root/proof.txt
COPY        ./app /app
WORKDIR     /app

# Install pip modules
RUN         pip install -r requirements.txt

EXPOSE      8080

CMD         python app.py
