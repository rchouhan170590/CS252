#!/bin/bash

r=`cat file1 | awk '{ print $4 }'`
echo $r
#sed -r 's/(.*);/\1/' file
