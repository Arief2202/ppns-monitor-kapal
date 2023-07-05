#!/bin/bash
`reset`
echo 'MQTT Subscriber Running';
while :
do
  msg=`mosquitto_sub -t monitor_kapal -C 1`
  res=`curl -d $msg -H "Content-Type: application/x-www-form-urlencoded" -X POST -s "http://monitorkapal.ppns.eepis.tech/api.php"`
  echo $res;
  msg2=`mosquitto_pub -t monitor_kapal -m "$res"`
done
