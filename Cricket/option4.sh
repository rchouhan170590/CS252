#!/usr/bin/bash


echo "Enter the name of player of that you want to delete the infomation"
read delname delsurname
valuename=`echo $delname-$delsurname`
val=`cat database | grep -n $valuename | sed 's,\:, ,g' | awk '{print $1 }'`
if [ $val ]
then
    a=`echo ${val}d`
    sed  -e $a database > filev
    cat filev > database
    rm filev
    echo "deleted Succesfully"
else
    echo "------------------------------------------"
    echo "- no such data found                     -"
    echo "- want to scrap information from website -"
    echo "- 1 for Yes , 2 for No                   -"
    echo "------------------------------------------"
    read input
    if [ $input == 1 ]
    then 
       ./option5.sh
    fi
fi

