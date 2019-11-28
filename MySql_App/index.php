<?php
session_start();
?>
<html>
<head>
<title>User Login</title>
<style> 
.qry {
  width: 60%;
  height: 10%;
  font-size: 150%;
}
</style>
</head>
<body>

<?php
if($_SESSION["name"]) 
{
?>
Welcome <?php echo $_SESSION["name"]."<br>"; ?><h3>Click here to <a href="logout.php" tite="Logout">Logout.</h3></a><br>
<?php
}
else 
  echo "<h1>Please login first .</h1>";

include 'ds_display.php';
?>


<form method="post" action="query.php">
INPUT QUERY :  <input  type="text" name="query" class="qry" ><br><br>
SUBMIT QUERY : <input type="submit" name="submit" value="submit" ><br><br>
</form>
<h2>--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</h2>

<?php
include 'usrcheckbox.php';
include 'devcheckbox.php';
include 'admincheckbox.php';
include 'syntex.php';
?>

</body>
</html>
