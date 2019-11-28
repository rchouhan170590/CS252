<?php
session_start();
unset($_SESSION["id"]);
unset($_SESSION["name"]);
header("Location:myapp.php");


// INSERT INTO `users` (`email`, `pswd`) VALUES ('user1@example.com', MD5('pass123'));
//CREATE USER 'dev'@'localhost' IDENTIFIED BY '900150983cd24fb0d6963f7d28e17f72';
//SHOW GRANTS FOR usr@localhost;
//show user from mysql.user;
//GRANT GRANT OPTION ON *.* TO username@localhost;
//DROP USER user [, user] ...
/*

usr(abc)
Read Data
dev (123)
Read Data , Add Data , Delete Data
admin(xyz)
All 
*/
?>



