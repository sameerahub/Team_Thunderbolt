<?php      
    include('connection.php');  
    $username = $_POST['user'];  
    $password = $_POST['pass'];  
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes (md5($password));  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  
      
        $sql = "select * from tbl_admin  where username = '$username' and password = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            
            header("Location: http://localhost/Team_Thunderbolt/first_page.php");
            echo "<h1><center> Login Successful </center></h1>";
            

        }  
        else{  
            echo "<h1> Login Failed!!! Invalid Username or Password.</h1>";  
        }     
?> 