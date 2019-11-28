#!/usr/bin/bash

echo "Enter the name of player "
read name surname
wname=`echo $name-$surname`

val=`cat database | grep $wname`
check=`echo $val | wc | awk '{print $2}'`
if [ $check == 0 ]
then 
    echo "no data availabe"
else
    echo "your query output"
    echo "Team		Name		ODI_batting		ODI_bowling"
    echo $val
fi

#newline words and byte.