<?php
session_start();
$sql=$_POST['query'];
$username=$_SESSION['username'];
$password=$_SESSION['password'];

include 'runquery.php';

?>
