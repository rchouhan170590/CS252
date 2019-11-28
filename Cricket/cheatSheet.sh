1) read value1 value2 value3 

   read -ra value     #read the whole input string  (white space sapareted string)
     echo ${value[0]}   #print the first word of the string 
     echo $value        #give the first word of string
     echo $value[0]     # if input is = rohit chouhan then output of this line is = rohit[0]

2) while [[ $a != $b ]]
   do
   done < myfile     #while loop take input from myfile file
3) if [ $a == $b ] 
   then
   elif
   then
   else
   fi

4) grep -n ms-dhoin    ##print whole line in which ms-dhoni is present with line no.
     cat database | grep -n ms-dhoin
     output =   9:india		ms-dhoni

5)
  sed 's,\value1,value2,g'   #replace value1 to value2 
    echo "9:india: ms-dhoni" | sed 's,:, ,g'

6) awk '{print $1}'
     echo "9:india: ms-dhoni" | sed 's,:, ,g' | awk '{print $1 }'   #give output 9

7)sed  -e 9d database    # remove the 9th line number from database file
  sed -e 9x  database    #remove the charactes present in 9th line but that 9th line still there while only white space ( or with no character )

8) count=`expr $count+2`    #increase the value of count by 2.

   this will not work
   use
   i=0
   i=$((i+1))
   echo $i                    # value of i increase to 1;

9) sed -n '/Career Information/q;p' full_page_left > profile  # delete all the line below Career Information line including this line. from file full_page_left.

10) sed -ne '/ICC Rankings/,$p' profile    # delete all the lines above ICC ranking line. including ICC ranking line.  

11) echo $link | wget -O- -i-  | hxnormalize -x | hxselect -i "div.cb-col.cb-col-33" | lynx -stdin -dump

tail -30 or head -30

ps -ag   #information of all running process.

if [ $uptime -lt 0 ] || [ $questions -lt 1 ] || [ $slow -gt 10 ]; then
    some code                                                               ## you can use -o also instead of || ( for or and -a for and )

if [ expr ]  #if expr value is true then return zero(0) else return non-Zero value or false.
 
myfunction()
{
   this is your code.                         # defining the function.
}

myfunction $x      # calling function


echo $var | sed "s,\,, ,g" | awk -v a='\n' '{print $1 a $2 a $3 a $4 }'    # var="abcabc,cabca,abe,eds,adte,ptras,bacsa" 
output = abcabc
         cabca
         abe
         eds

awk '{print $0 }'   #will print the whole string.

sed '1i value1, value2' fileName.sh     #it will add this line in 1st line , if (2i) then add in 2nd line    #but only edit at standard input place.

sed -i '1i value1 value2' filename.sh  #it will edit in file place. 

sed 's/$/value/' filename   ## add value in last of the every line
sed 's/^/value/' filename  ## add value in the begining of every line

sed '3s/a/A/g' sample.txt

sed '/Gmail/p' filename.txt #print only those line which contain gmail.

sed '/Yahoo/q' filename.txt  #print till you encoutered specific pattern. say Yahoo for now.

file permission == owener group other  , read write execute 

----------------------------------------------------------
wc fileName     # lines words characters  will be our output
wc -l filename  # will give total lines in file.
wc -w filename  # will give total word's present in file
wc -m filename  # will give total character in file.
---------------------------------------------------------

cut -f n -d ',' time.sh
# if our file has m column seperated by comma then it will print the
# n'th column from file. 
#instead of comma you can use any single char delemenetor.

cut -f 1,2 -d ' ' time.sh 
#will give 1st and 2nd column which are seperated by ' ' (white space).
---------------------------------------

ls | egrep 'time2.sh|test'
# it will grap this two things 

