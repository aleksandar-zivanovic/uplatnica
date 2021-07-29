<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);


/* * ** Server settings *** */
//$mail->SMTPDebug = SMTP::DEBUG_SERVER;                    // Enable verbose debug output
$mail->isSMTP();                                          // Send using SMTP
$mail->Host = Config::SMTP_HOST;                    // Set the SMTP server to send through
$mail->SMTPAuth = true;                                 // Enable SMTP authentication
$mail->Username = Config::SMTP_USER;                    // SMTP username
$mail->Password = Config::SMTP_PASSWORD;                // SMTP password
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;       // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
$mail->Port = Config::SMTP_PORT;                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
$mail->CharSet = 'UTF-8';                                 // Omogucavan UTF-8 karaktere


/* * ** Recipients *** */
$mail->setFrom(Config::FROM_EMAIL, Config::FROM_NAME);
$mail->addAddress($clean_email);                                // Add a recipient


/* * ** Content *** */
$mail->isHTML(true);                                      // Set email format to HTML
$mail->Subject = "Naslov";
$mail->Body = '<p>Kliknite na link ispod ili kopirajte adresu ispod u svoj web pretrazivac, da biste resetovali svoju sifru'
        . '<br><a href="http://localhost/uplatnica/reset.php?email='.$clean_email.'&token='.$reset_token.'">http://localhost/uplatnica/reset.php?email='.$clean_email.'&token='.$reset_token.'</a></p>';


if ($mail->send()) {
    header("location:login.php?token_set=success");
} else {
    echo "Message could not be sent. Mailer Error";
}