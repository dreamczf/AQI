#!/bin/bash +xv

rand=$(cat /proc/sys/kernel/random/uuid | tr -d '-' | cut -c1-14 | tr 'a-f' '0-5')

if [[ $1 == "langfang" ]];
then
	wget "http://60.10.151.92:8088/datas/day/130000.xml?radn="$rand -o langfang.day.log -O langfang.day.xml -T 120 -t5
elif [[ $1 == "hebei" ]];
then
	wget "http://121.28.49.85:8080/datas/day/130000.xml?radn="$rand -o hebei.day.log -O hebei.day.xml -T 120 -t5
fi
