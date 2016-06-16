#!/bin/bash
docker rm $(docker ps -aq)

docker run -d -p 192.168.3.51:80:80 ast/lfi
docker run -d -p 192.168.3.53:443:443 ast/heartbleed
docker run -d -p 192.168.3.54:80:80 ast/ghost
docker run -d -p 192.168.3.52:80:80 ast/sqli01
docker run -d -p 192.168.3.52:8080:80 ast/sqli02
docker run -d -p 192.168.3.52:8088:80 ast/sqli03
docker run -d -p 192.168.3.55:80:8080 ast/imagetragick
docker run -d -p 192.168.3.56:21:21 -p 192.168.3.56:5555:5555 ast/pyserv
docker run -d -p 192.168.3.57:80:80 ast/stealer
docker run -d -p 192.168.3.58:80:80 ast/cmdi
