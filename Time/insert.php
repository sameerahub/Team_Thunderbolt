<?php
include('dbcon.php');

    if(isset($_POST['text']))
    {
    	
    	$text =$_POST['text'];
    	$date = date('Y-m-d');
    	$time = date('H:i:s');

        $sql ="SELECT * FROM table sameera WHERE sindex ='$text' AND LOGDATE= '$date' AND status='0'";
        $query=$conn->query($sql);
        if($query->num_row>0)
        {
        	$sql = "UPDATE table sameera SET time_out =NOW(), status= '1' WHERE sindex ='$text'm AND LOGDATE='$date'";
        	$query=$conn->query($sql);
        	$_SESSION['success'] = 'Successfuly time out';
        }
        else
        {
            $sql = "INSERT INTO table sameera ( sindex,time_in,LOGDATE,status) VALUES('$TEXT', '$TIME', '$DATE', 0)";
    	    if($conn->query($sql) ===TRUE)
            {
    	   	 $_SESSION['success'] = 'Successfuly time in';
    	    }
             else
             {
    	      $_SESSION['error'] = $conn->error;
             }
        }  
    
    }
    else
    {
    	 $_SESSION['error'] = 'Pleace Scan your QR Code number';
    }

    header("location: gh.php");

    $con->close();

?>    
