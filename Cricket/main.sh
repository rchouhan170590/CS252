echo "Hello......"
cat database > copyDatabase
chmod 777 greet.sh
./greet.sh
read cmd

while [[ $cmd != 6 ]]
do 
    if [ $cmd == 1 ]
    then     
        echo "~~~~~~~~~~~~This is our whole database~~~~~~~~~~~~~~~~"
        cat database
        ./greet.sh
        read cmd
    
    elif [ $cmd == 2 ]
    then     
        
        chmod 777 option2.sh
        ./option2.sh         
        ./greet.sh
        read cmd
    elif [ $cmd == 3 ]
    then
         chmod 777 option3.sh
         ./option3.sh
         ./greet.sh
         read cmd
    
    elif [ $cmd == 4 ]
    then 
        chmod 777 option4.sh
        ./option4.sh
        ./greet.sh
        read cmd
    
    elif [ $cmd == 5 ]
    then 
        chmod 777 option5.sh
        ./option5.sh
         echo "  "
        ./greet.sh
        read cmd
    else
        echo "Input the correct value"
        read cmd
    fi
done 

if [ $cmd == 6 ]
then
   echo "want to save all edited information"
   echo "1 for yes and 2 for no"
   read res
   if [ $res == 1 ]
   then
       echo "your responses is save" 
       echo "Thankyou !!!!!!!!!!!!!"
   else
       cat copyDatabase > database
       echo "Thankyou !!!!!!!!!!!!!"
   fi
fi

