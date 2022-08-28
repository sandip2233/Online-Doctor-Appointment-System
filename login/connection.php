<?php      
    $host = "localhost";  
    $user = "root";  
    $password = "";  
    $db="project";
      
    $con = mysqli_connect($host, $user, $password, $db);  
    if(mysqli_connect_errno()) 
    {  
        die("Failed to connect with MySQL: " . mysqli_connect_error());  
    }  
?>  