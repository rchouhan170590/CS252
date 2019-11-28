#!/usr/bin/bash


echo "option2"
echo "Enter the team of player"
read team
echo "Enter the name of player"
read name
#------------------------------------------------------

flage=0
while read -r line; 
do
    if [ $line = $team ] 
    then 
        filename=$line
        echo "$name" >> $filename
        echo "----------------------------------------------"
        flage=1
        break
    fi
done < teamname

if [ $flage == 0 ]
then 
    touch $team
    chmod 777 $team
    echo "$name" >> $team
    
fi


echo "Data Added succesfully!!!!!!!!!!"

