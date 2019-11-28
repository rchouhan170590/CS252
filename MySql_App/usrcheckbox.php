<?php
session_start();
?>
<html>
<body>

<?php 
if(strcmp($_SESSION["domine"],"1") == 0)
{  ?>
<h2> See the Table Without Query </h2>
<form action="checkbox.php" method="post">
 
  <input type="checkbox" name="select" value="select"> Want to See Table??<br>   
  <input type="checkbox" name="id" value="id"> Select Id &nbsp&nbsp
  <input type="checkbox" name="Name" value="Name" > Select Name &nbsp&nbsp
  <input type="checkbox" name="Location" value="Location"> Select Location  &nbsp&nbsp
  <input type="checkbox" name="Contact_No" value="Contact_No" > Select Contact No &nbsp&nbsp
  <input type="checkbox" name="Salary" value="Salary"> Select Salary &nbsp&nbsp
  <input type="checkbox" name="Age" value="Age" > Select Age <br><br>
  <input type="submit" value="Submit">
</form>

<h2>--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</h2>
<form action="chat.php" method="post">
Want to Chat with Admin?<br><br>
<input type="submit" value="Yes" >
</form>
<h2>--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</h2>


<?php
}
?>


</body>
</html>
