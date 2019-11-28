<?php
$dropuser = $_POST['dropuser'];
$s = "'";

$username='username';
$password = 'password';
$sql = 'DROP USER '.$s.$dropuser.$s."@'localhost' ; ";
include 'runquery.php';
$sql = 'DELETE FROM user_name WHERE username ='.$s.$dropuser.$s.' ;';
include 'runquery.php';
//$username='rchouhan';
//$password = 'jnv';
$sql = $sql1.$sql2;
//echo $sql;
//include 'runquery.php';
?>
