<?php
$username="username";
$password="password";
$message="";
if(count($_POST)>0) 
{
  $conn = mysqli_connect('localhost',$username,$password,'mydb') or die('Unable To connect');

  $loginuser = mysqli_real_escape_string($conn, $_POST['user_name']);
  $loginpass = mysqli_real_escape_string($conn, $_POST['password']);

  $result = mysqli_query($conn,"SELECT * FROM user_name WHERE username='" .$loginuser. "' and password = '".md5($loginpass)."'");
  $row  = mysqli_fetch_array($result);
  if(is_array($row)) 
  {
     $message = "Username and Password! exist<br>";
  } 
  else 
  {
     $newuser = $loginuser;//$_POST["user_name"];
     $newpass = md5($loginpass);//md5($_POST["password"]);
     include 'usertp.php';
     //echo $newuser.'<br>';
     //echo $newpass;
     $x = 1;
  }
}

if($x == 1) 
{
   header("Location:login.php");
}
?>

<html>
<head>
<title>Registration</title>
</head>
<body>

<form name="frmUser" method="post" action="" align="center">
<div class="message"><?php if($message!="") { echo $message; } ?></div>
<h3 align="center">Enter  Details for Registration</h3>
 Username:<br><input type="text" name="user_name"><br>
 Password:<br><input type="password" name="password"><br><br>
 <input type="submit" name="submit" value="Submit">
 <input type="reset">
</form>

</body>
</html>
