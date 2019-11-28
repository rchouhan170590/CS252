#!/bin/sh

#grep -Po 'SELECT\K[^"]+' file > file2

#grep the string between select and from including both

grep -o 'SELECT.*FROM' file1 > file2
awk '{$1 = ""; $NF = ""; print}' file2 > file3

cat file3
cat file1 > temp
rm file2 file3 

