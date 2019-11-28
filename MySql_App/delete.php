<?php
session_start();

$username=$_SESSION['username'];
$password=$_SESSION['password'];

$id = $_POST['id'];
$Name = $_POST['Name'];
$Location = $_POST['Location'];
$Contact = $_POST['Contact_No'];
$Salary = $_POST['Salary'];
$Age = $_POST['Age'];

if( $id or $Name or $Location or $Salary or $Age or $Contact )
{
   $s = "'";
   $sql = '';
   $sql2 = "DELETE FROM Doctor_list WHERE ";
   if($id)
   {
      $sql = ' id='.$id.' ';
   }
   if($Name)
   {
     if(strcmp($sql,'') == 0)
     {
         $sql = ' Name = '.$s.$Name.$s.' ';   
     }
     else
         $sql = $sql.'AND Name = '.$s.$Name.$s.' ';
   }
   if($Location)
   {
     if(strcmp($sql,'') == 0)
     {
        $sql = ' Location = '.$s.$Location.$s.' ';
     }
     else
        $sql = $sql.'AND Location = '.$s.$Location.$s.' ';
   }
   if($Salary)
   {
     if(strcmp($sql,'') == 0)
     {
        $sql = ' Salary = '.$s.$Salary.$s.' ';
     }
     else
        $sql = $sql.'AND Salary = '.$s.$Salary.$s.' ';
   }
   if($Age)
   {
     if(strcmp($sql,'') == 0)
     {
        $sql = ' Age = '.$s.$Age.$s.' ';
     }
     else
        $sql = $sql.'AND Age = '.$s.$Age.$s.' ';
   }
   if($Contact)
   {
     if(strcmp($sql,'') == 0)
     {
        $sql =' Contact_No = '.$s.$Contacct.$s.' ';
     }
     else
         $sql = $sql.'AND Contact_No = '.$s.$Contacct.$s.' ';
   }
   $sql = $sql.' ;';
   $sql = $sql2.$sql;
   include 'runquery.php';
}
else
  echo "Please Insert atleast one value"; 
?>
