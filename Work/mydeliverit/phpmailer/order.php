<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';
require 'db.php';


// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

$errors         = array();      // array to hold validation errors
$data           = array();      // array to pass back data

// Form variables
$name = $_POST['name'];
$honeypot = $_POST['hpot'];
$email = $_POST['email'];
$email2 = "orders@deliver-it.ng";
$phone = $_POST['phone'];
$service = $_POST['service'];
$pickup = $_POST['pickup'];
$dropoff = $_POST['dropoff'];
$message = $_POST['message'];
$tracking_id = $_POST['id'];
$now = date("F j, Y, g:i a");
$mailbody = $_POST['mail'];
$subject = "Details of Your Order";


// validate the variables =================================================
// if any of these variables don't exist, add an error to our $errors array

if (empty($name))
    $errors['name'] = 'Name is required.';

if (empty($email))
    $errors['email'] = 'Email is required.';

if (empty($phone))
    $errors['phone'] = 'Phone Number is required.';

if (empty($pickup))
    $errors['pickup'] = 'Pickup Location is required.';

if (empty($dropoff))
    $errors['dropoff'] = 'Dropoff Location is required.';
    
if ($honeypot)
    $errors['honeypot'] = 'Server Error';
    
if ($service != "Errand" && $service != "Delivery")
    $errors['service'] = 'Specify the service you want ';

// return a response =====================================================


if ( ! empty($errors)) {

  // if there are items in our errors array, return those errors
  $data['success'] = false;
  $data['errors']  = $errors;
  echo json_encode($data);
}



 $sql = "INSERT INTO orders (name, email, phone, service, pickup, dropoff, message, tracking_id, createtimestamp) VALUES ('$name', '$email', '$phone', '$service', '$pickup', '$dropoff', '$message', '$tracking_id', '$now')";


if (!($conn->query($sql) === TRUE)) {
  $errors['other'] = 'There has been an error please try again';
  $data['success'] = false;
  $data['errors']  = $errors;
  echo json_encode($data);
}

$conn->close();

try {
   
    $mail = new PHPMailer;
    //Recipients
    $mail->setFrom('noreply@deliver-it.ng', 'Deliver-IT');
    $mail->addAddress($email, $name);     // Add a recipient
    $mail->addAddress($email2);               // Name is optional
    $mail->addReplyTo('orders@deliver-it.ng', 'Deliver-IT');
//     $mail->addCC('cc@example.com');
//     $mail->addBCC('bcc@example.com');
// 
//     // Attachments
//     $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//     $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);            // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $mailbody;
    $mail->AltBody = $mailbody;

    $mail->send();
  echo json_encode([
        'success' => true,
        'message' => "Your message has been sent."
    ]);
    exit;
} catch (Exception $e) {
    $errors['other'] = 'There has been an error please try again';
    echo json_encode([
        'success' => false,
        'errors'  => $errors,
        'message' => "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"
    ]);
}

?>