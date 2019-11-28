<?php
session_start();
$username="username";
$password="passwordd";


$newuser = $_POST['newuser'];
$newpass = md5($_POST['newpass']);
if( $newuser and $newpass )
{
    $usertype = $_POST['usertype'];
    //$devtype = $_POST['devtype'];
    //$admintype = $_POST['admintype'];
   
    if($usertype)
    {
         $s = "'";
         $oneprint = '';
         if(strcmp($usertype,'usertype')==0)
         {
             include 'usertp.php';
         }
         elseif(strcmp($usertype,'devtype')==0)
         {
            $sql = 'INSERT INTO user_name(username,password,domine) VALUES ('.$s.$newuser.$s.' , '.$s.$newpass.$s.' , '.$s.'2'.$s.' );';
            include 'runquery.php';
            //echo "<br>insert  ".$sql."<br>";
         
            $sql = 'CREATE USER '.$s.$newuser.$s.'@'.$s.'localhost'.$s.' IDENTIFIED BY '.$s.$newpass.$s.' ;';
            include 'runquery.php';
            //echo "<br>creat  ".$sql."<br>";
            
            $sql='GRANT SELECT,INSERT,DELETE ON mydb.Doctor_list TO '.$newuser.'@localhost;';
            include 'runquery.php';
            //echo "<br>insert  ".$sql."<br>";
         }
         else //($admintype)
         {
             $sql = 'INSERT INTO user_name(username,password,domine) VALUES ('.$s.$newuser.$s.' , '.$s.$newpass.$s.' , '.$s.'3'.$s.' );';
             include 'runquery.php';
             //echo "<br>insert  ".$sql."<br>";
         
            $sql = 'CREATE USER '.$s.$newuser.$s.'@'.$s.'localhost'.$s.' IDENTIFIED BY '.$s.$newpass.$s.' ;';
            include 'runquery.php';
            //echo "<br>creat  ".$sql."<br>";

            $sql='GRANT ALL PREVILEGE ON mydb.Doctor_list TO '.$newuser.'@localhost;';
            include 'runquery.php';
            //echo "<br>delete  ".$sql."<br>";
         }
    }
    else
       echo "Atleast one Permission is Required";
    
}
else 
    echo "You Not Enter Username OR Password.<br>";
?>
