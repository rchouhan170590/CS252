<?php
session_start();
?>
<html>
<body>

<?php 
if(strcmp($_SESSION["domine"],"3") == 0)
{  ?>
<form action="adduser.php" method="post">
<h2> Add new user for This aplication </h2>
Username : <input type="text" name="newuser"><br><br>
Password : <input type="text" name="newpass"><br><br>
  <input type="radio" name="usertype" value="usertype">Add New User &nbsp&nbsp 
  <input type="radio" name="usertype" value="devtype" > Add New Dev type User &nbsp&nbsp
  <input type="radio" name="usertype" value="admintype"> Add New Admin &nbsp&nbsp<br><br>

<input type="submit" value="Add User">
</form>

-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
<h2> Want to Chat with Users</h2>
<form action='adminchat.php' method='post'><br>
<input type="submit" value="YES">
</form>


-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
<form action="dropusr.php" method="post">
<h2>Delete the User/Dev </h2>
Input the Username : <input type="text" name="dropuser"><br><br>
<input type="submit" value="Submit">
</form>
-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------


<form action="checkbox.php" method="post">
<h2>See the Table Without Mysql code Query </h2>
  <input type="checkbox" name="select" value="select"> Want to See Table??<br>   
  <input type="checkbox" name="id" value="id"> Select Id &nbsp&nbsp
  <input type="checkbox" name="Name" value="Name" > Select Name &nbsp&nbsp
  <input type="checkbox" name="Location" value="Location"> Select Location  &nbsp&nbsp
  <input type="checkbox" name="Contact_No" value="Contact_No" > Select Contact No &nbsp&nbsp
  <input type="checkbox" name="Salary" value="Salary"> Select Salary &nbsp&nbsp
  <input type="checkbox" name="Age" value="Age" > Select Age <br><br>
  <input type="submit" value="Submit">
</form>
-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
<h2> Insert Into the Table without Mysql Code Query </h2>
<form action="checkbox.php" method="post">
<input type="checkbox" name="insert" value="insert"> Want to Insert into Table??<br>  

Input Name :&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input  type="text" name="Name"  > <br><br>
Input Location :&nbsp&nbsp&nbsp&nbsp&nbsp <input  type="text" name="Location"  > <br><br>
Input Contact No. : <input  type="text" name="Contact_No" > <br><br>
Input Salary :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input  type="text" name="Salary" > <br><br>
Input Age : &nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input  type="text" name="Age" ><br><br>
<input type="submit" value="Submit" >

</form>
-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------

<h2> Delete From the Table without Mysql Code Query </h2>
Input atleast one Field. <br><br>
<form action="delete.php" method="post">
Input ID :&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input  type="text" name="id"  > <br><br>
Input Name :&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input  type="text" name="Name"  ><br><br>
Input Location :&nbsp&nbsp&nbsp&nbsp&nbsp <input  type="text" name="Location"  ><br><br>
Input Contact No. : <input  type="text" name="Contact_No" ><br><br>
Input Salary :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input  type="text" name="Salary" ><br><br>
Input Age :&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input  type="text" name="Age" ><br><br>
<input type="submit" value="Submit" >

</form>
-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
<?php
}
?>


</body>
</html>
