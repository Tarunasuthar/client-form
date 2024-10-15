<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Information Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <h2>Client Information Form</h2>
        <form id="clientForm" method="post">
        <div><input type="text" name="first_name" placeholder="First Name" id="first_name" required></div>
        <div><input type="text" name="last_name" placeholder="Last Name" id="last_name" required></div>
        <div><input type="email" name="email" placeholder="Email" id="email" required></div>
        <div><input type="tel" name="phone" placeholder="Phone Number" id="phone" required></div>
        <div><textarea name="details" placeholder="Additional Details" rows="4" id="details"></textarea></div>
        <div><button type="submit" name="send">Submit</button></div>
        </form>
        <div id="message"></div>
    </div>
</body>
</html>

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['send']))
{
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $details = $_POST['details'];

//Load Composer's autoloader
require 'Mailer\Exception.php';
require 'Mailer\PHPMailer.php';
require 'Mailer\SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try { 
    $mail->isSMTP();                                           
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'tnuxyzparmar4002@gmail.com';                     //SMTP username
    $mail->Password   = 'wwzu dtvi riyx mqws';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('tnuxyzparmar4002@gmail.com', 'Mailer');
    $mail->addAddress('b220904@skit.ac.in', 'Joe User');     //Add a recipient
    

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = "first name - $first_name <br> last_name- $last_name </b> email- $email <br> phone number- $phone <br> message $details";

    $mail->send();
     echo "<div class='success-message'>
     <div=success-icon>Message has been sent</div></div>";
} catch (Exception $e) {
    echo "<div class='success-message'>
    <div class='success-icon'>Message could not be sent</div></div>";
}
}
?>
