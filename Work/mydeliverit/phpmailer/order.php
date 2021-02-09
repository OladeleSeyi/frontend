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
$name = $_POST['name'];
$honeypot = $_POST['hpot'];
$email = $_POST['email'];
$email2 = "order@deliver-it.ng";
$phone = $_POST['phone'];
$service = $_POST['service'];
$dropoff = $_POST['dropoff'];
$message = $_POST['message'];
$mail = $_POST['mail'];
$subject = $_POST['subject'];


$msg = "success";
$err = true ;

// echo 'this is the top\n'."fname " .$fname." lname = " .$lname." email = " .$email." subject = ".$subject. "  message = ".$message2   ;

try {
    
    if ($honeypot) {
        throw new Exception('Validation Error.');
    }
    
    //Recipients
    $mail->setFrom('noreply@deliver-it.ng', 'Deliver-IT');
    $mail->addAddress($email, $name);     // Add a recipient
    $mail->addAddress($email2);               // Name is optional
    $mail->addReplyTo('order@deliver-it.ng', 'Deliver-IT');
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