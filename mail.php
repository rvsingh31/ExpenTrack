<?php

$msg = $_POST["suggestion"];
if($msg=="")
{
	header("location:index.php?msg=Please specify some text to send!");
	exit;
}

require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;
session_start();
//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'ownerofmysite@gmail.com';                 // SMTP username
$mail->Password = 'splitwise';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('ownerofmysite@gmail.com');
//$mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
$mail->addAddress("ravindersingh3104.rs@gmail.com");               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Invitation';
$mail->Body    = "Response from a person: <bt>".$msg;
$mail->AltBody = '';

if(!$mail->send()) {
    $msg= 'Error sending your response, Sorry !';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    $msg='Your response has been recieved.We will contact you soon .Thank You !';
}

header("location:index.php?msg=".$msg);
?>