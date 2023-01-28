<?php

$conn= mysqli_connect("localhost",
				"root", "", "sams");

require "PHPMailer.php";
require "SMTP.php" ;
require "PHPMailer-master/src/Exception.php" ;

// Server settings

//use PHPMailer\PHPMailer\PHPMailer;

//use PHPMailer\PHPMailer\SMTP;

//use PHPMailer\PHPMailer\Exception;

//require "vendor/autoload.php";

$mail = new PHPMailer\PHPMailer\PHPMailer();
//$mail = new PHPMailer(true);

// Enable verbose debug output
$mail->isSMTP();

// Send using SMTP
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;

// SMTP username
$mail->Username = "devteamthunder@gmail.com";

// SMTP password				
$mail->Password = "ramcmihrxkeobezy";
$mail->SMTPAuth = "tls";
$mail->Port = 587;		

//Recipients
// This email-id will be taken
// from your database
$mail->setFrom("#");

// Selecting the mail-id having
// the send-mail =1
//$sql = "select * from users where send_mail=1";
$sql = "SELECT * FROM att INNER JOIN student ON att.id = student.id WHERE DATE(record_time) = CURDATE() AND out_or_in = 'out' AND suspend=0 ORDER BY At_id DESC "; 
// Query for the making the connection.
$res = mysqli_query($conn, $sql);

if(mysqli_num_rows($res) > 0) {
	while($x = mysqli_fetch_assoc($res)) {
		$mail->addAddress($x['email']);
	}

	// Set email format to HTML
	$mail->isHTML(true);
	$mail->Subject =
		"Times up Warning!";
		
	$mail->Body = "<h3>This is system generated message from student attendance management system.</h3> <h1> Times up! Get Back To campus!</h1>";
	
	$mail->AltBody = "You Are late ";
	

	
	if($mail->send())
	{
	echo "Message has been sent check mailbox";
	}
	else{
		echo "failure due to the google security";
	}
}
	
?>
