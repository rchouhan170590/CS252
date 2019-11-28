#!/usr/bin/bash


echo "Contury		Name		ODI_Batting		ODI_Bowling">database


run=0
while [[ $run == 0 ]]
do
  read name link team
  run=$?
  echo $link | wget -O- -i-  | hxnormalize -x | hxselect -i "div.cb-col.cb-col-33" | lynx -stdin -dump > data
  chmod 777 data
  sed -n '/Career Information/q;p' data > newdata
  chmod 777 newdata
  #cat profile
  sed -ne '/ICC Rankings/,$ p' newdata > finaldata
  
  temp=0
  count=0 
  while [ $temp == 0 ]
  do
    read a b 
    temp=$?
  if [ $count == 0 ]
  then
       arr[0]=$a
       arr[1]=$b
       count=`expr $count+2`
  else
       arr[$count]=$a
       count=`expr $count+1`
  fi
  done < finaldata
  
  echo "$team		$name		${arr[8]}		${arr[12]}" >>database
  clear
done < linkfile
sed -i '$ d' database
rm data newdata finaldata
#cat database
