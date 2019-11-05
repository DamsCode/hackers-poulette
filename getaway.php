<?php

use PHPMailer\PHPMailer\{PHPMailer, Exception};

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';


function filterInput(string $value){
    return  filter_var($value, FILTER_SANITIZE_FULL_SPECIAL_CHARS,FILTER_FLAG_NO_ENCODE_QUOTES);
}
function checkEmail(string $value){
    return filter_var($value, FILTER_SANITIZE_EMAIL,FILTER_VALIDATE_EMAIL);
}
function checkText(string $value){
    return filter_var($value,FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
}

// Takes raw data from the request
$json = file_get_contents('php://input');
// Converts it into a PHP object
$data = json_decode($json);
$inputfiltred = array();
foreach ($data as $key => $value){
    switch ($key){
        case "email": $inputfiltred[$key] = checkemail($value);
            break;
        case "LastName":
        case "FirstName":
        case "message": $inputfiltred[$key] = checkText($value);
            break;
        case "genre":
        case "Subject":
        case "country": $inputfiltred[$key] = filterInput($value);
            break;
    }
}
$mail = new PHPMailer();

try {
    $mail->isSMTP();  // Send using SMTP
    $mail->Host       = "localhost";                    // Set the SMTP server to send through
    $mail->Port       = 25;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('hackdamspoul@yopmail.com', 'damien');
    $mail->addAddress('hackdamspoul@yopmail.com', 'Joe User');     // Add a recipient

    // Content
    $mail->isHTML(false);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body ';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();

    $response = array(
        'status' => true,
        'message' => 'Success'
    );
    echo json_encode($response);
} catch (Exception $e) {
     echo json_encode($e->errorMessage());
}
