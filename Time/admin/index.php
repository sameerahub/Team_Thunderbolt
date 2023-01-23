<?php include('config/const.php');


?>
<html>

<head>
    <title>Login System</title>
    <link rel="stylesheet" type="text/css" href="style.css">

    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
<br>

<h1>Student Attendance Management System</h1>

<div class="dg">
<div class="form-wrapper">

<h1 style="color:#121236;"><center>Admin Panel</center></h1>
  <form action="#" method="post">
    <h3>Login here</h3>
	
    <div class="form-item">
		<input type="text" name="username" required="required" placeholder="Username" autofocus required></input>
    </div>
    
    <div class="form-item">
		<input type="password" name="password" required="required" placeholder="Password" required></input>
    </div>
    
    <div class="button-panel">
		<input type="submit" class="button" title="Log In" name="submit" value="Login"></input>
    </div>
  </form>
  <?php
//check whether submit btn click or not
if (isset($_POST['submit'])) {
    //process the login

    //get the data from login form
    // $username = $_POST['username'];
    // $password = md5($_POST['password']);

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password =  mysqli_real_escape_string($conn, (md5($_POST['password'])));
    // //sql to check whether the username and password exits or not
    $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

    // //execute the query
    $res = mysqli_query($conn, $sql);

    // //count rows to check wether the user exits or not
    $count = mysqli_num_rows($res);
    echo $count;

    if ($count == 1) {

        //user found and login success
        $_SESSION['login'] = " <div class='success'>Login Successfull</div>";
        $_SESSION['user'] = $username; //to check whether the user logged in or not and logout will unset it
        $_SESSION['login_time'] = time();

        //redirect home page dashbord
        header("location:" . SITEURL . 'admin/clc.php');
    } else {

        //no user and login fail
        $_SESSION['login'] = " <div class='error'>Login UnSuccessfull</div>";

        //redirect to login page
        header("location:" . SITEURL . 'admin/index.php');
    }
}

?>
  <div class="reminder">
    <p>Not a member? <a href="#">Sign up now</a></p>
    <p><a href="#">Forgot password?</a></p>
  </div>
  
</div>

</body>

</html>

