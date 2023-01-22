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
$mail->Username = "yomindurajasuriya@gmail.com";

// SMTP password				
$mail->Password = "jpminhvmawcrlsnf";
$mail->SMTPAuth = "tls";
$mail->Port = 587;		

//Recipients
// This email-id will be taken
// from your database
$mail->setFrom("sams");

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
		"Mailer Multiple address in php";
		
	$mail->Body = "Hii </p>Myself </h1>Rohit
	sahu</h1> your Article has been acknowledge
	by me and shortly this article will be
	contributing in</p> <h1>Geeks for Geeks !</h1>";
	
	$mail->AltBody = "Welcome to Geeks for geeks";
	
	if($mail->send())
	{
	echo "Message has been sent check mailbox";
	}
	else{
		echo "failure due to the google security";
	}
}
	
?>
