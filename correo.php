<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/phpmailer/src/Exception.php';
require 'phpmailer/phpmailer/src/PHPMailer.php';
require 'phpmailer/phpmailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                                    // Enable verbose debug output
    $mail->isSMTP();                                         // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                // Enable SMTP authentication
    $mail->Username   = 'app.rescuecall@gmail.com';          // SMTP username
    $mail->Password   = 'asdfasdf40';                        // SMTP password
    $mail->SMTPSecure = 'tls';                               // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                 // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('app.rescuecall@gmail.com', 'RescueCall');
    $mail->addAddress($email, 'User');     // Add a recipient
    $mail->addReplyTo('app.rescuecall@gmail.com', 'Information');
  
   // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Welcome to RescueCall';
    $mail->Body    = '
    <h1> RescueCall | Coming soon</h1>
    <p> You will receive an email when Our App is launched. Be Ready!</p>';
    $mail->AltBody = 'You will receive an email when Our App is launched. Be Ready!';

    $mail->send();
   // echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
