<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

$OTPAlertMessage = "";
$response = array();

// Get the email from the POST request
$send_to_email = $_POST["mobileOrEmail"];

// Clear any existing session data related to OTP
unset($_SESSION['CODE_OTP']);

$otp = rand(100000, 999999);
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->SMTPDebug = 2; // Set to 2 for debugging
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Your SMTP server
    $mail->SMTPAuth = true;
    $mail->Username = 'trollgame121319@gmail.com'; // Your SMTP username
    $mail->Password = 'pfvtgjbbwmubkcmb'; // Your SMTP password
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Recipients
    $mail->setFrom('Facebook@gmail.com', 'Facebook');
    $mail->addAddress($send_to_email); // Replace with the user's email address

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Your OTP Code';
    $mail->Body = "Your verification code is: <b style='font-size: 15px;'>" . $otp . '</b>';

    $mail->send();
    $_SESSION['CODE_OTP'] = $otp;

    $response['status'] = 'success';
    $response['message'] = 'OTP sent successfully.';

} catch (Exception $e) {
    $response['status'] = 'error';
    $response['message'] = 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
}

// Return JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
