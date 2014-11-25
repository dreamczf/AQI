#!/bin/bash +xv

if [[ $1 == "langfang" ]];
then
	wget "http://60.10.151.92:8088/datas/hour/130000.xml?radn="$rand -o langfang.hour.log -O langfang.hour.xml -T 120 -t5
elif [[ $1 == "hebei" ]];
then
	wget "http://121.28.49.85:8080/datas/hour/130000.xml?radn="$rand -o hebei.hour.log -O hebei.hour.xml -T 120 -t5
fi
