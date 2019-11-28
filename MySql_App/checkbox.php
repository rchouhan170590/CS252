<?php
session_start();

$username=$_SESSION['username'];
$password=$_SESSION['password'];

$var='';
if($_POST['select'])
{ 
    if($_POST['id']) 
    {
       $var = $_POST['id'];
   
    }
    if($_POST['Name'])
    {
       if(strcmp($var,'') == 0)
          $var = $_POST['Name'];
       else
          $var = $var.' , '.$_POST['Name'];
    }
    if($_POST['Location'])
    { 
       if(strcmp($var,'') == 0)
           $var = $_POST['Location'];
       else
           $var = $var.' , '.$_POST['Location'];
    }
       if($_POST['Contact_No'])
    {
       if(strcmp($var,'') == 0)
           $var = $_POST['Contact_No'];
       else
           $var = $var.' , '.$_POST['Contact_No'];
    }
    if($_POST['Salary'])
    {
       if(strcmp($var,'') == 0)
           $var = $_POST['Salary'];
       else
           $var = $var.' , '.$_POST['Salary'];
    }

    if($_POST['Age'])
    {
       if(strcmp($var,'') == 0)
          $var = $_POST['Age'];
       else
          $var = $var.' , '.$_POST['Age'];
    }
    $sql = 'SELECT '.$var.' FROM Doctor_list;';
    include 'runquery.php';
}
elseif($_POST['insert'])
{
   if($_POST['Name']and$_POST['Location']and$_POST['Contact_No'] and $_POST['Salary'] and $_POST['Age'])
   { 
     $s = "'";
     $sql= 'INSERT INTO Doctor_list(Name , Location , Contact_No , Salary , Age) VALUES ('.$s.$_POST['Name'].$s.','.$s.$_POST['Location'].$s.','.$s.$_POST['Contact_No'].$s.','.$s.$_POST['Salary'].$s.','.$s.$_POST['Age'].$s.');';
     //echo $sql;
     include 'runquery.php';
   }
   else
     echo "Please fill all field.<br>";
}
?>
