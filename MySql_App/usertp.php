<?php
//$newuser = "ab'hi";
//$newpass = 'dw';
$oneprint = '';
$s = "'";
$sql = 'INSERT INTO user_name(username,password,domine) VALUES ('.$s.$newuser.$s.' , '.$s.$newpass.$s.' , '.$s.'1'.$s.' );';
include 'runquery.php';
//echo $sql.'<br>';         
$sql = 'CREATE USER '.$s.$newuser.$s.'@'.$s.'localhost'.$s.' IDENTIFIED BY '.$s.$newpass.$s.' ;';
include 'runquery.php';
//echo $sql.'<br>';       
$sql='GRANT SELECT ON cs252.Doctor_list TO '.$s.$newuser.$s.'@'.$s.'localhost'.$s.';';
include 'runquery.php';
//echo $sql.'<br>';
$sql = 'CREATE TABLE '.$newuser.'_chat(id int(11) not null auto_increment primary key,message varchar(255),date timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,status varchar(2),msgby varchar(10));';
//echo $sql.'<br>';
include 'runquery.php';

//$sql='GRANT SELECT ON cs252.'.$newuser.'_chat TO '.$newuser.'@localhost;';
//include 'runquery.php';
//echo $sql.'<br>';
?>
