<?php      
    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "sams";  
      
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Unable to connect with MySQL: ". mysqli_connect_error());  
    }  
?>  