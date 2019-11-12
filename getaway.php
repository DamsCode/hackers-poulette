<?php

use PHPMailer\PHPMailer\{PHPMailer, Exception, SMTP};

require './phpmailer/src/Exception.php';
require './phpmailer/src/PHPMailer.php';
require './phpmailer/src/SMTP.php';


function filterInput(string $value){
    return  filter_var($value, FILTER_SANITIZE_FULL_SPECIAL_CHARS,FILTER_FLAG_NO_ENCODE_QUOTES);
}
function checkEmail(string $value){
    return filter_var($value, FILTER_SANITIZE_EMAIL,FILTER_VALIDATE_EMAIL);
}
function checkText(string $value){
    return filter_var($value,FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
}

//gestion post(ajaj)
$json = file_get_contents('php://input');
if ($json !=""){
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

//gestion email
    $mail = new PHPMailer();

    try {
        $mail->isSMTP();  // Send using SMTP
        $mail->Host       = "localhost";                    // Set the SMTP server to send through
        $mail->Port       = 25;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('hackdamspoul@yopmail.com', 'damien');
        $mail->addAddress($inputfiltred["email"], $inputfiltred["FirstName"]." ".$inputfiltred["LastName"]);     // Add a recipient

        // Content
        $mail->isHTML(false);                                  // Set email format to HTML
        $mail->Subject = $inputfiltred["subject"];
        $mail->Body    = $inputfiltred["message"];
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
//gestion reponse
        $response = array(
            'message' => 'Your message has been send',
            'error' => false
        );
    } catch (Exception $e) {
        $response = array(
            'message' => $e->errorMessage(),
            'error' => true
        );
    }
}else{
    $response = array(
        'message' => 'bad request',
        'error' => true
    );
}
echo json_encode($response);
