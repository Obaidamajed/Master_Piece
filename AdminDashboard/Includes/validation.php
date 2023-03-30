<?php

// name => required , string , min = 3 charachters
// email => required , email 
// password => required , string , max = 20 characters


$error = '';
$success = '';

function requiredInput($value) {
  $str = trim($value);
  if(strlen($str) > 0){
    return true;
  }
  return false;
}


// sanitize-string-inputs
function santString($value) {
  $str = trim($value); // بتقص الفراغات على يمين ويسار السترنق
  $str = filter_var($str, FILTER_SANITIZE_STRING); // بعقم او بشيل أي إشي ضار في الداتا بايس 
  return $str;
}

// sanitize-email-inputs
function santEmail($email) {
  $email = trim($email);
  $email = filter_var($email, FILTER_SANITIZE_EMAIL);
  return $email;
}


// minimum number 

function minInput($value,$min) {
  if(strlen($value) < $min){
    return false;
  }
  return true;
}

// maximum number 

function maxInput($value,$max) {
  if(strlen($value) > $max){
    return false;
  }
  return true;
}

// validate email 

function validEmail($email) {
  if(filter_var($email, FILTER_VALIDATE_EMAIL)) { // Check if email is wrote correctly or not
    return true;
  }
  return false;
}

// Validate Date 

function Day($value){
  if(strlen($value) < 1 or $value < 0 or $value > 31) {
    return false;
  }
  return true;
}

function Month($value){
  if(strlen($value) < 1 or $value < 0 or $value > 12) {
    return false;
  }
  return true;
}

function Year($value){
  if(strlen($value) < 4 or $value < 2007 or $value > 2016) {
    return false;
  }
  return true;
}

function Size($value){
  if((strlen($value) >= 1 && strlen($value) < 3) or strlen($value) == 0) {
    return true;
  }
  return false;
}












