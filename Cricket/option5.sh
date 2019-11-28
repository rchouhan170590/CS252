#!/usr/bin/bash

echo "Enter the name of player that you want to scrap informaiton"
read pname psurname 

if [ $psurname ]
then
    c=`echo "$pname-$psurname"`
else
    c=$pname
fi

run=0
while [[ $run == 0 ]]
do
  read name link
  run=$?
  if [ $name == $c ]
  then
     break
  fi
done < linkfile

#echo $link

############################ profile data ###########################
echo $link | wget -O- -i-  | hxnormalize -x | hxselect -i "div.cb-col.cb-col-33" | lynx -stdin -dump > full_page_left 
chmod 777 full_page_left
sed -n '/Career Information/q;p' full_page_left > profile
chmod 777 profile
#cat profile
sed -ne '/ICC Rankings/,$ p' profile > ranking

chmod 777 ranking

run=0
count=0
while [ $run == 0 ]
do
  read a b 
  run=$?
  if [ $count == 0 ]
  then
       arr[0]=$a
       arr[1]=$b
       count=`expr $count+2`
  else
       arr[$count]=$a
       count=`expr $count+1`
  fi
done < ranking

echo "----------------------$pname $psurname-----------------------------------"> newprofile
sed -n '/ICC Rankings/q;p' profile >> newprofile
chmod 777 newprofile
 
#cat ranking 
echo "-------------------------------------------------------------------------" >> newprofile
echo "${arr[0]} ${arr[1]}" >>newprofile
echo "       ${arr[3]} ${arr[4]} ${arr[5]}">>newprofile
echo "${arr[6]} ${arr[7]} ${arr[8]} ${arr[9]}">>newprofile
echo "${arr[10]} ${arr[11]} ${arr[12]} ${arr[13]}">>newprofile
echo "-------------------------------------------------------------------------">>newprofile
#cat newprofile



############################# other data #####################
echo $link | wget -O- -i-  | hxnormalize -x | hxselect -i "div.cb-hm-rght.cb-player-bio" | lynx -stdin -dump > batting_data
clear
chmod 777 batting_data
sed -n '/Career Information/q;p' batting_data > table
sed -ne '/Batting Career Summary/,$ p' table  > newtable
#cat newtable
cat newtable >> newprofile
clear
rm batting_data table newtable
cat newprofile
rm newprofile
