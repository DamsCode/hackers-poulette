<?php
function filterInput(string $value){
    return  filter_var($value, FILTER_SANITIZE_FULL_SPECIAL_CHARS,FILTER_FLAG_NO_ENCODE_QUOTES);
}
function checkEmail(string $value){
    return filter_var($value, FILTER_SANITIZE_EMAIL,FILTER_VALIDATE_EMAIL);
}
function checkText(string $value){
    return filter_var($value,FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
}
$inputfiltred = array();
foreach ($_POST as $key => $value){
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
var_dump($inputfiltred);