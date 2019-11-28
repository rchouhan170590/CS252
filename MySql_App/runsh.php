<?php
$val = shell_exec('sh shell.sh');
$str_arr = explode (",", $val);  
echo $str_arr[0];
 
?>
