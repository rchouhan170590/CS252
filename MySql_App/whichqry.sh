#!/bin/sh

val=`awk '{print $1}' file1` 
select="SELECT"
select2="select"
show1="SHOW"
show2="show"

val2=`cat file1 | grep '_chat'`
strlen=${#val2}

if [ $val = $select ] || [ $val = $select2 ]
then 
    if [ $strlen = 0 ]
    then
        echo 1
    else
        echo 4
    fi    
elif [ $val = $show1 ] || [ $val = $show2 ]
then
    echo 2
else
    
    echo 3
fi

