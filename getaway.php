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

foreach ($_POST as $key => $value){
    switch ($key){
        case "email": checkemail($value);
            break;
        case "LastName":
        case "FirstName":
        case "message": checkText($value);
            break;
        case "genre":
        case "Subject":
        case "country": filterInput($value);
            break;
    }
}
