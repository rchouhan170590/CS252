<?php
    
    $column = shell_exec('sh shell.sh');
    $arr = explode("," ,$column);
 
    $arr[0] = preg_replace('/\s/', '', $arr[0]);
  
    $count=0;
 
    $result = mysqli_query($conn,$sql);
    
    $str="*";
    if(strcmp($arr[0],$str) == 0)
    {
        $var = shell_exec('sh whichTab.sh');
        $var = preg_replace('/\s/', '', $var);
        $var = trim( $var,';');
        //echo "value of var  strlen '".$var.strlen($var)."'<br>";
        if(strcmp($var,'user_name')==0)
        {
            echo '<table border="2" cellspacing="5" cellpadding="5" font face="Arial">'; 
            echo '<tr> <td> id </td> <td> username </td> <td> password </td><td>domine</td>';  

            if(mysqli_num_rows($result) > 0)
            {  
            
                while($row = mysqli_fetch_assoc($result))
                {
                  echo '<tr>';  
                  echo '<td>'.$row['id'].'</td><td>'.$row['username'].'</td><td>'.$row['password'].'</td><td>'.$row['domine'].'</td>';
                  echo '</tr>';            
                }
            
             }
             else
                echo "0 reuslt<br>";

        }
        else
        {
            echo '<table border="2" cellspacing="5" cellpadding="5" font face="Arial">';
            echo '<tr> <td> id </td> <td> Name </td> <td> Location </td><td>Contact_No</td><td>Salary</td><td>Age</td>';
        
            if(mysqli_num_rows($result) > 0)
            {  
            
                while($row = mysqli_fetch_assoc($result))
                {
                  echo '<tr>';  
                  echo '<td>'.$row['id'].'</td><td>'.$row['Name'].'</td><td>'.$row['Location'].'</td><td>'.$row['Contact_No'].'</td><td>'.$row['Salary'].'</td><td>'.$row['Age'].'</td>';
                  echo '</tr>';            
                }
            
             }
             else
                echo "0 reuslt<br>";
        }
    }
    else
    {  
         echo '<table border="2" cellspacing="5" cellpadding="5" font face="Arial">';
         echo '<tr>';
         while($arr[$count])
         {
            $arr[$count] = preg_replace('/\s/', '', $arr[$count]);     //replace white space.
            echo '<td>'.$arr[$count].'</td>';
            $count = $count + 1;
         }
         echo '</tr>';
        if(mysqli_num_rows($result) > 0)
        { 
           
           while($row = mysqli_fetch_assoc($result))
           {
              $run=0;
              echo '<tr>';
              while($run < $count)
              {
                 $var = $arr[$run];
                 $var1 = $row[$var];
              
                 echo '<td>'.$var1.'</td>';
                 $run = $run + 1;
              }
              echo '</tr>';     
           }
           
        }
        else
        {
           echo "0 result"."<br>";
        } 
    } 


?>
