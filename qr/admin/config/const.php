<?php
//start the session
session_start();

//create constant
define('SITEURL', 'http://localhost/loginn/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'sameera');

//create connection and select database connction

$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error($conn));
$dbselect = mysqli_select_db($conn, DB_NAME) or die(mysqli_error($conn));
