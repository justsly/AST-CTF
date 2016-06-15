#!/bin/bash

while true; do
curl -X POST -H 'Content-Type: application/x-www-form-urlencoded' --data "username=admin&password=ferriSecure&submit=Daten+absenden" https://127.0.0.1/login.php --insecure
sleep 1
done
