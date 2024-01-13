<?php
require_once('config.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';
require '../phpmailer/src/Exception.php';

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $randomNumber = mt_rand(1000, 9999);

    $sql = "SELECT * FROM `user_details` WHERE `email` = '$email'";
    $checkEmailQuery = mysqli_query($conn, $sql);

    if (mysqli_num_rows($checkEmailQuery) > 0) {
        echo "Email Already Exists.";
    } else {
        $mail = new PHPMailer(true);

        // SMTP configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Replace with your SMTP server address
        $mail->SMTPAuth = true;
        $mail->Username = 'mkalangutkar13@gmail.com';  // Replace with your email address
        $mail->Password = 'aotlmlxzxkvncccc';  // Replace with your email password
        $mail->SMTPSecure = 'ssl';  // Set the encryption method (tls or ssl)
        $mail->Port = 465;  // Replace with the appropriate port number

        // Sender and recipient details
        $mail->setFrom('mkalangutkar13@gmail.com', 'Mandar');  // Replace with your name and email address
        $mail->addAddress($email, 'test');  // Replace with recipient's name and email address

        $mail->isHTML((true));
        // Email content
        $mail->Subject = 'Hello from Convo Station!';
        $mail->Body = 'Your Verification Code is : ' . $randomNumber;

        // $mail->Body = ' <table style="width: 100%; height: 100%;">
        // <tr>
        //    <td align="center" valign="middle">
        //      <h1 style="color: #ff0000;">Hello !</h1>
        //      <p style="text-align: center;">This is a demo message.</p>
        //    </td>
        //   </tr>
        // </table>';

        // Send the email
        if ($mail->send()) {
            $sql = "INSERT INTO `verify` (`email`,`code`) VALUES ('$email',$randomNumber)";
            $insertCodeQuery = mysqli_query($conn, $sql);

            if ($insertCodeQuery) {
                echo "done";
            } else {
                echo 'something went wrong';
            }
        } else {
            echo 'Error: Unable to send the email.';
        }
    }
}

mysqli_close($conn);
