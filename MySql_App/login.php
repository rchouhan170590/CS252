<?php
session_start();
$message="";
if(count($_POST)>0) 
{

  $con = mysqli_connect('localhost','username','password','mydb') or die('Unable To connect');
  $loginuser = mysqli_real_escape_string($con, $_POST['user_name']);
  $loginpass = mysqli_real_escape_string($con, $_POST['password']);
  $result = mysqli_query($con,"SELECT * FROM user_name WHERE username='" .$loginuser. "' and password = '".md5($loginpass)."'");
  $row  = mysqli_fetch_array($result);
  if(is_array($row)) 
  {
     $_SESSION["id"] = $row['id'];
     $_SESSION["name"] = $row['username'];
     $_SESSION["username"] = $loginuser;//$row['username'];
     $_SESSION["password"] = md5($loginpass);//$row['password'];
     $_SESSION["domine"] = $row['domine'];
  } 
  else 
  {
     $message = "Invalid Username or Password!";
  }
}

if(isset($_SESSION["id"])) 
{
   header("Location:index.php");
}
?>


<html>
<head>
<title>User Login</title>
</head>
<body>
<form name="frmUser" method="post" action="" >
<div class="message"><?php if($message!="") { echo $message; } ?></div>
<h3 align1="center">Enter Login Details</h3>
 Username:<br><input type="text" name="user_name"><br>
 Password:<br><input type="password" name="password"><br><br>
 <input type="submit" name="submit" value="Submit">
 <input type="reset">
</form>

</body>
</html>
