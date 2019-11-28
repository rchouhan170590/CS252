<?php

if(strcmp($_POST['new'],'old')==0)
{
   header("Location:login.php");
}
elseif(strcmp($_POST['new'],'new1') == 0)
{
  header("Location:regist.php");
}
?>


<html>
<body>
<form action="" method="post">
<h2>Hi Please Select Relevant Option. </h2>
  <input type="radio" name="new" value="old"> I am already Registered??<br>   
  <input type="radio" name="new" value="new1"> I am New User<br><br>
  <input type="submit" value="Submit">
</form>

</body>
</html>

