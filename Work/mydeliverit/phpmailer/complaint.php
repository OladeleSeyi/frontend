<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';
require 'db.php';
require 'messageMaker.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

$errors = array(); // array to hold validation errors
$data = array(); // array to pass back data

// Form variables
$name = $_POST['name'];
$honeypot = $_POST['hpot'];
$email = $_POST['email'];
$email2 = "jiydarispo@nedoz.com";
$phone = $_POST['phone'];
$service = $_POST['service'];
$message = $_POST['message'];
$orderId = $_POST['orderId'];
$complaintId = $_POST['complaintId'];
$now = date("F j, Y, g:i a");
$mailbody = $_POST['mail'];

// validate the variables =================================================
// if any of these variables don't exist, add an error to our $errors array

if (empty($name)) {
    $errors['name'] = 'Name is required.';
}

if (empty($email)) {
    $errors['email'] = 'Email is required.';
}

if (empty($phone)) {
    $errors['phone'] = 'Phone Number is required.';
}

if (empty($orderId)) {
    $errors['orderId'] = 'Order Id is required';
}

if ($honeypot) {
    $errors['honeypot'] = 'Server Error';
}

if ($service != "Errand" && $service != "Delivery") {
    $errors['service'] = 'Specify the service you want ';
}

// return a response =====================================================

if (!empty($errors)) {
    // if there are items in our errors array, return those errors
    $data['success'] = false;
    $data['errors'] = $errors;
    echo json_encode($data);
    exit();
}

//  $sql = "INSERT INTO complaints (name, email, phone, service, complainId, message, orderId, createtimestamp) VALUES ('$name', '$email', '$phone', '$service', '$complainId', '$message', '$orderId', '$now')";

// if (!($conn->query($sql) === TRUE)) {
//   $errors['other'] = 'There has been an error please try again';
//   $data['success'] = false;
//   $data['errors']  = $errors;
//   echo json_encode($data);
// }

// $conn->close();

$m = complaintMaker($name, $orderId, $complaintId, $message, $phone, $service);

try {
    $mail = new PHPMailer();
    //Recipients
    $mail->setFrom('noreply@deliver-it.ng', 'Deliver-IT');
    $mail->addAddress($email, $name); // Add a recipient
    $mail->addAddress($email2); // Name is optional
    $mail->addReplyTo('orders@deliver-it.ng', 'Deliver-IT');
    //     $mail->addCC('cc@example.com');
    //     $mail->addBCC('bcc@example.com');
    //
    //     // Attachments
    //     $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //     $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = $m[1];
    $mail->Body = $m[0];
    $mail->AltBody = $mailbody;

    $mail->send();
    echo json_encode([
        'success' => true,
        'message' => "Your message has been sent."
    ]);
    exit();
} catch (Exception $e) {
    $errors['other'] = 'There has been an error please try again';
    echo json_encode([
        'success' => false,
        'errors' => $errors,
        'message' => "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"
    ]);
}

?>
