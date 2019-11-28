
#Add information about any player

echo "Enter the first and last name of player"
read name surname
echo "Enter the team name , ODI_bat,ODI_bow Value"
read team odi1 odi2



valuename=`echo $name-$surname`
val=`cat database | grep -n $valuename | sed 's,\:, ,g' | awk '{print $1 }'`
if [ $val ]
then
    echo "Data is already exist"
    echo "want to update? Enter 1 for Yes 2 for No"
    read a
    if [ $a == 1 ]
    then
        echo $team		$valuename		$odi1		$odi2>>database
        echo "data update succesfully"
    fi
else
        echo "$team		$valuename		$odi1		$odi2">>database
        echo "data update succesfully"

fi
