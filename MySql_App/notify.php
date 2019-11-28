<?php
session_start();
$username ='username';// $_SESSION['username'];
$password = 'password';//$_SESSION['password'];


$conn = new mysqli("localhost",$username,$password,"mydb");
if($conn->connect_error)
{
  die("Connection error: ".$conn->connect_error);
}

$s = "'";
$sql = 'SELECT username FROM user_name;';
$request = mysqli_query($conn,$sql);

if(mysqli_num_rows($request)>0)
{
   while($row = mysqli_fetch_assoc($request))
   {
       $tablename = $row['username'].'_chat';
       
       $qry = 'SELECT id,status FROM  '.$tablename.' ORDER BY id DESC LIMIT 1;';
       
       $request1 = mysqli_query($conn,$qry);
       if(mysqli_num_rows($request1)>0)
       {
          while($stat_row = mysqli_fetch_assoc($request1))
          {
              if(strcmp($stat_row['status'],'0')==0)
              {
                   $delnot = 1;
                   
                   if($_POST['deletenot'] and (strcmp($_POST['deletenot'],$row['username']) == 0) )
                   {
                         $newqry = 'UPDATE '.$tablename.' SET status = '.$s.'1'.$s.'  WHERE id ='.$stat_row['id'].';';
                         if(!$conn->query($newqry))
                         {
                            echo "ERROR :<br>".$conn->error;
                         }
                   }
                   else
                   {
                       echo "You have Message from ".$row['username']."<br>";
                   }
                
              
                
              }
          }
       }
        
   }
}

//echo "everything find<br>";
?>
