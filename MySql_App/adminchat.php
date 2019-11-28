<?php
$delnot = 0;
session_start();
include 'notify.php';

?>

<html>
<body>

<h3> Chat with users   (Input in Only one option)</h3>
<form action="" method="post">

<h6>--------------------------------------------------------------------------------------------------------------------------------------</h6>
Send Message to username : <input  type="text" name="senduser"  ><br><br>
Input Message : <input  type="text" name="msg"  >
<h6>--------------------------------------------------------------------------------------------------------------------------------------</h6>
Input See Chat With Username : <input type='text' name='chatwith' >
<h6>--------------------------------------------------------------------------------------------------------------------------------------</h6>
<?php  if($delnot == 1) { ?>
Want to  Delete Notification of this usr?<br>
Input Username : <input type='text' name = 'deletenot'>


<?php
}
?>
<h6>--------------------------------------------------------------------------------------------------------------------------------------</h6>
Want to Leave this Page??<input type='checkbox' name='leave' >
<h6>--------------------------------------------------------------------------------------------------------------------------------------</h6>
<input type="submit" value="Submit" >

</form>

</body>
</html>


<?php



$username1=$_POST['senduser'];
$msg = $_POST['msg'];

$tablename= $username1.'_chat';



if($msg)
{
     $s = "'";
     $sql = 'INSERT INTO '.$tablename.' (message,status,msgby) VALUES( '.$s.$msg.$s.' ,'.$s.'1'.$s.','.$s.'admin'.$s.');';
     //echo $sql;
     if($conn->query($sql) == TRUE)
     {
        $sql = 'SELECT * FROM '.$tablename.' ORDER BY id DESC LIMIT 5;';
        $request = mysqli_query($conn,$sql);
        
        if(mysqli_num_rows($request) >0)
        {
           echo '<table border="2" cellspacing="5" cellpadding="5" font face="Arial">'; 
            echo '<tr> <td> Id </td> <td> Date </td><td> Message By </td> <td> Message </td>'; 
           while($row = mysqli_fetch_assoc($request))
           {
               echo '<tr>';  
               echo '<td>'.$row['id'].'</td><td>'.$row['date'].'</td><td>'.$row['msgby'].'</td><td>'.$row['message'].'</td>';
               echo '</tr>';
           }
        }
     }
     else
     {
         echo "some error found <br>".$conn->error;
     } 
}

if($_POST['chatwith'])
{
   
     $tablename = $_POST['chatwith'].'_chat';
     $s = "'";
     $sql = 'SELECT * FROM '.$tablename.' ORDER BY id DESC;';
     $request = mysqli_query($conn,$sql);
        
     if(mysqli_num_rows($request) >0)
     {
        echo '<table border="2" cellspacing="5" cellpadding="5" font face="Arial">'; 
        echo '<td> Date </td><td> Message By </td> <td> Message </td>'; 
        while($row = mysqli_fetch_assoc($request))
        {
               echo '<tr>';  
               echo '<td>'.$row['date'].'</td><td>'.$row['msgby'].'</td><td>'.$row['message'].'</td>';
               echo '</tr>';
        }
        
     }
     else
     {
         echo "some error found <br>".$conn->error;
     } 

}

if($_POST['leave'])
{
   header('Location:index.php');
}

/// CREATE TABLE dev_chat(id int(11) not null auto_increment primary key,message varchar(255),date timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,status varchar(2),msgby varchar(10));

?>
