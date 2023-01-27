<?php

include('connection.php');
$id_from_barcode_scan= "AA1930"; //value that taken from barcode scan


//`student` table contains student index no and relavant barcode id for each student.
$sql = 'SELECT * FROM student where sindex = $id_from_barcode_scan LIMIT 1';
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)!=0){
  //there was a matching barcode in db
  $row = mysql_fetch_assoc($result);
  //now check for current student's attendance records for today
  $sql = 'SELECT * FROM `student` where DATE(`creted_timestamp`) = CURDATE() and `student_id` = "'+$row['student_id']+'"';
  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result)==0){
    //this means this is user's "in"
    $sql = "INSERT INTO `att`(id, 'status', 'creted_timestamp') VALUES ('"+$row['student_id']+"', 'in', now())";
    if(mysqli_query($conn, $sql)){
      echo "attendance marked 'in' for student: "+$row['student_name'];
    } else{
      echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
  } else if(mysql_num_rows($result)==1){
    //this means this is user's "out"
    $sql = "INSERT INTO `att`(id, 'status', 'creted_timestamp') VALUES ('"+$row['student_id']+"', 'out', now())";
    if(mysqli_query($conn, $sql)){
      echo "attendance marked 'out' for student: "+$row['student_name'];
    } else{
      echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
  } else if(mysql_num_rows($result) > 1){
    //this means this is user's is using barcode for 3rd time, which is invalid
    echo "You have already used your pass for today";
  }
} else{
  //no matching barcode in db
  echo "invalid barcode";
}