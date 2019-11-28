<html>
<body>
--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
<h2> Chat with Admin </h2>
<form action="" method="post">
Input Your Msg : <input  type="text" name="msg"  ><br><br>
<input type="checkbox" name='clear'> Remove Old Msg.<br><br>
<input type="checkbox" name='seechat'> See All Msg.<br><br>
<input type="checkbox" name='leave'> Want to leave this page?<br><br>
<input type="submit" value="Send" >
</form>
---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
<br><br>
</body>
</html>

<?php


session_start();
$name = $_SESSION['username'];
$password = $_SESSION['password'];
$msg = $_POST['msg'];
$remove = $_POST['clear'];
$seechat = $_POST['seechat'];
$leave = $_POST['leave'];
$username = 'username';
$password = md5('password');

$conn = new mysqli("localhost",$username,$password,"mydb");
if($conn->connect_error)
{
  die("Connection error: ".$conn->connect_error);
}

$tablename = $name.'_chat';

if($msg)
{
     $s = "'";
     $sql = 'INSERT INTO '.$tablename.' (message,status,msgby) VALUES( '.$s.$msg.$s.' ,'.$s.'0'.$s.','.$s.$name.$s.');';
     if($conn->query($sql) == TRUE)
     {
        $sql = 'SELECT * FROM '.$tablename.' ORDER BY id DESC LIMIT 5;';
        $request = mysqli_query($conn,$sql);
        
        if(mysqli_num_rows($request) >0)
        {
           echo '<table border="2" cellspacing="5" cellpadding="5" font face="Arial">'; 
            echo '<tr>  <td> Date </td><td> Message By </td> <td> Message </td>'; 
           while($row = mysqli_fetch_assoc($request))
           {
               echo '<tr>';  
               echo '<td>'.$row['date'].'</td><td>'.$row['msgby'].'</td><td>'.$row['message'].'</td>';
               echo '</tr>';
           }
        }
     }
     else
     {
         echo "some error found <br>".$conn->error;
     } 
}
if($remove)
{
   $sql = 'DELETE FROM '.$tablename.' ;';
   if($conn->query($sql) == TRUE )
   {
      echo "Old Chat removed succesfully!!!!!";
   }
}
if($seechat)
{
   //echo "yes";
   
   $sql = 'SELECT * FROM '.$tablename.' ORDER BY id DESC  ;';
   
  
   $request = mysqli_query($conn,$sql);
   
   if(mysqli_num_rows($request)>0)
   {
       echo '<table border="2" cellspacing="5" cellpadding="5" font face="Arial">'; 
       echo '<tr> <td> Date </td> <td> Message By </td><td> Message </td> ';

       while($row = mysqli_fetch_assoc($request))
       {
               echo '<tr>';  
               echo '<td>'.$row['date'].'</td><td>'.$row['msgby'].'</td><td>'.$row['message'].'</td>';
               echo '</tr>';         
       } 
   }
   else
     echo "error"; 
}
if($leave)
{
  $file = $name.'checkbox.php';
  header("Location:index.php");   
}

?>
