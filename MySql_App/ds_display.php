<?php

session_start();
$login_domine = $_SESSION['domine'];


if(strcmp($login_domine,'3')==0)
{
    echo "<h2>--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</h2>";
    echo "<h2>Hey Admin </h2>";
    echo "Table Name : Doctor_list<br>";
    echo "Columns :|	id	|	Name	|	Location	|	Contact_No	|	Salary	|	Age	|";
    echo "<br>Table Name : user_name<br>";
    echo "Columns :|	id	|	username	|	passowrd	|";

    echo "<h2>--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</h2>";

} 

elseif(strcmp($login_domine,'1') == 0)
{
    echo "<h2>--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</h2>";
    echo "<h2>You Have only Read Permission on Doctor_list Table.</h2>";
    echo "Table Name : Doctor_list<br>";
    echo "Columns :|	id	|	Name	|	Location	|	Contact_No	|	Salary	|	Age	|";
    echo "<h2>--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</h2>";

}
else
{
    echo "<h2>--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</h2>";
    echo "<h2>You Have ALL  Permission on Doctor_list Table.</h2>";
    echo "Table Name : Doctor_list<br>";
    echo "Columns :|	id	|	Name	|	Location	|	Contact_No	|	Salary	|	Age	|";
    echo "<h2>--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</h2>";

}


?>
