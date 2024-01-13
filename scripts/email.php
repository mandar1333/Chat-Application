<?php
// Include the PHPMailer library
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';
require '../phpmailer/src/Exception.php';

$mail = new PHPMailer(true);

// SMTP configuration
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';  // Replace with your SMTP server address
$mail->SMTPAuth = true;
$mail->Username = 'mkalangutkar13@gmail.com';  // Replace with your email address
$mail->Password = 'wqicwoebffwnqbop';  // Replace with your email password
$mail->SMTPSecure = 'ssl';  // Set the encryption method (tls or ssl)
$mail->Port = 465;  // Replace with the appropriate port number

// Sender and recipient details
$mail->setFrom('mkalangutkar13@gmail.com', 'Mandar');  // Replace with your name and email address
$mail->addAddress('mandarkalangutkar2003@gmail.com', 'test');  // Replace with recipient's name and email address

$mail->isHTML((true));
// Email content
$mail->Subject = 'Hello from PHPMailer!';
$mail->Body = 'This is a test email sent using PHPMailer.';

// Send the email
if ($mail->send()) {
    echo 'Email sent successfully.';
} else {
    echo 'Error: Unable to send the email.';
}
