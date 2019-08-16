<?php
function toSession($key, $value){
  session_start();
  $_SESSION[$key] = $value;
}

function fromSession($param){
  $value = "";
  if(!isset($_SESSION)){
    session_start();
  }
  if(isset($_SESSION[$param])){
    $value = $_SESSION[$param];
    unset($_SESSION[$param]);
  }
  return $value;
}

function sanitizar($value) {
   $search = array("\\",  "\x00", "\n",  "\r",  "'",  '"', "\x1a");
   $replace = array("\\\\","\\0","\\n", "\\r", "\'", '\"', "\\Z");
   return str_replace($search, $replace, $value);
}

function getPost($var){
    if (isset($_POST[$var]))
      return sanitizar($_POST[$var]);
}
?>
