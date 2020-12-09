<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';


// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

// Form variables
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$honeypot = $_POST['hpot'];
$email = $_POST['email'];
$email2 = "info@deliver-it.ng";
$subject = $_POST['subject'];
$message = $_POST['message'];
$message2 = $lname." says ".$message;


$msg = "success";
$err = true ;

// echo 'this is the top\n'."fname " .$fname." lname = " .$lname." email = " .$email." subject = ".$subject. "  message = ".$message2   ;

try {
    
    if ($honeypot) {
        throw new Exception('Validation Error.');
    }
    
    //Recipients
    $mail->setFrom('noreply@deliver-it.ng', 'Deliver-IT');
    $mail->addAddress($email, $lname);     // Add a recipient
    $mail->addAddress($email2);               // Name is optional
    $mail->addReplyTo('info@deliver-it.ng', 'Deliver-IT');
//     $mail->addCC('cc@example.com');
//     $mail->addBCC('bcc@example.com');
// 
//     // Attachments
//     $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//     $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $message;
    $mail->AltBody = $message;

    $mail->send();
   echo json_encode([
        'success' => true,
        'message' => $message
    ]);
    exit;
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"
    ]);
}

?>