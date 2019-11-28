<?php


$conn = new mysqli("localhost",$username,$password,"mydb");
if($conn->connect_error)
{
  die("Connection error: ".$conn->connect_error);
}

$fp = fopen("file1","w") or die("Unable to open file!");
fwrite($fp,$sql);                     //write permission for file.txt
fclose($fp);


$whichOut = shell_exec('sh whichqry.sh');

if($sql=="")
{
   echo "Please Insert  Any Query;";
}
elseif($whichOut == 1)
{   
     include 'selectqry.php';
}
elseif($whichOut == 2)
{

   $list = array_column(mysqli_fetch_all($conn->query($sql)),0);
   $r = 0;
   while($list[$r])
   {
      echo $list[$r]."<br>";
      $r = $r + 1;
   }
   if($r == 0)
      echo "0 result<br>";
}
elseif($whichOut == 4)
{
    echo "Please Go chat option and see there";
}
else
{
   if($conn->query($sql) == TRUE )
   {
        if(strlen($oneprint)==0)
        {
           echo "Query executed succesfully<br>";
           $oneprint = 'abcd';
        }
   }
   else
   {
        echo "Some Error is Found<br>".$conn->error;
   }
   
}

mysqli_close($conn);

?>
