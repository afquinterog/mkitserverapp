# !/bin/bash
#PATH=/usr/local/bin 

df -H | grep -vE '^Filesystem|tmpfs|cdrom|none|udev' | awk '{ print $5 "|" $1 "|" }' | while read output;
do
  echo $output
  mem=$(free -m | awk 'NR==2{printf "%s/%s|%.2f|\n",$3,$2,$3*100/$2}')
  memc=$(free -m | awk 'NR==3{printf "%s\n",$3}')
  cpu=$(top -bn1 | grep load | awk '{printf "%.2f\n",$(NF-2)}')
  con=$(netstat -an | grep :80 | wc -l | awk '{printf "%.0f\n",$0}')
  ip=$(netstat -alpn | grep :80 | awk '{print $5}' |awk -F: '{print $(NF-1)}' |sort | uniq -c | sort -nr |  wc -l)
  echo $mem
  echo $cpu
  dat=
  dat=$output
  dat+=$mem
  dat+=$cpu
  dat+=$con
  echo "$dat"
  url="http://ec2-52-25-67-96.us-west-2.compute.amazonaws.com/mkitserverinfo.php?server=3&disk=$output&mem=$mem&cpu=$cpu&con=$con&ip=$ip&memc=$memc"
  echo $url
  curl $url
done



