<?php
require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;
session_start();
$to=$_GET["to"];
$from_name=$_SESSION["client_name"];
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
$mail->addAddress($to);               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Invitation';
$mail->Body    = 'You have been invited to ExpenTrack by your friend '. $from_name.' .<br>Using ExpenTrack ,You can manage your bills without mere confusion . <br>To get further information, Visit xyz.com .';
$mail->AltBody = '';

if(!$mail->send()) {
    $msg= 'Invitation could not be sent due to some error!Sorry, for the inconvenience caused.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    $msg='Invitation has been sent';
}

header("location:select_event.php?msg=".$msg);