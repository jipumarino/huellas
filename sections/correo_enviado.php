<?php

/*

Thank you for choosing FormToEmail by FormToEmail.com

Version 2.4 June 21st 2008

COPYRIGHT FormToEmail.com 2003 - 2008

You are not permitted to sell this script, but you can use it, copy it or distribute it, providing that you do not delete this copyright notice, and you do not remove any reference or links to FormToEmail.com

For support, please visit: http://formtoemail.com/support/

*/

$my_email = "contacto@centrohuellas.cl";
$continue = "/";


$errors = array();

// Remove $_COOKIE elements from $_REQUEST.

if(count($_COOKIE)){foreach(array_keys($_COOKIE) as $value){unset($_REQUEST[$value]);}}

// Validate email field.

if(isset($_REQUEST['email']) && !empty($_REQUEST['email']))
{

$_REQUEST['email'] = trim($_REQUEST['email']);

if(substr_count($_REQUEST['email'],"@") != 1 || stristr($_REQUEST['email']," ")){$errors[] = "La dirección de correo no es válida";}else{$exploded_email = explode("@",$_REQUEST['email']);if(empty($exploded_email[0]) || strlen($exploded_email[0]) > 64 || empty($exploded_email[1])){$errors[] = "La dirección de correo no es válida";}else{if(substr_count($exploded_email[1],".") == 0){$errors[] = "La dirección de correo no es válida";}else{$exploded_domain = explode(".",$exploded_email[1]);if(in_array("",$exploded_domain)){$errors[] = "La dirección de correo no es válida";}else{foreach($exploded_domain as $value){if(strlen($value) > 63 || !preg_match('/^[a-z0-9-]+$/i',$value)){$errors[] = "La dirección de correo no es válida"; break;}}}}}}

}

// Check referrer is from same site.

if(!(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER']) && stristr($_SERVER['HTTP_REFERER'],$_SERVER['HTTP_HOST']))){$errors[] = "You must enable referrer logging to use the form";}

// Check for a blank form.

function recursive_array_check_blank($element_value)
{

  global $set;

  if(!is_array($element_value)){if(!empty($element_value)){$set = 1;}}
  else
  {

    foreach($element_value as $value){if($set){break;} recursive_array_check_blank($value);}

  }

}

recursive_array_check_blank($_REQUEST);

if(!$set){$errors[] = "No puede dejar estos campos en blanco.";}

unset($set);

// Display any errors and exit if errors exist.

if(count($errors)){foreach($errors as $value){print "$value<br>";} exit;}

if(!defined("PHP_EOL")){define("PHP_EOL", strtoupper(substr(PHP_OS,0,3) == "WIN") ? "\r\n" : "\n");}

// Build message.

function build_message($request_input){if(!isset($message_output)){$message_output ="";}if(!is_array($request_input)){$message_output = $request_input;}else{foreach($request_input as $key => $value){if(!empty($value)){if(!is_numeric($key)){$message_output .= str_replace("_"," ",ucfirst($key)).": ".build_message($value).PHP_EOL.PHP_EOL;}else{$message_output .= build_message($value).", ";}}}}return rtrim($message_output,", ");}

$message = build_message($_REQUEST);

$message = stripslashes($message);

$subject = stripslashes($subject);

$subject = "Mensaje enviado desde web de Centro Huellas";

$from_name = "";

if(isset($_REQUEST['name']) && !empty($_REQUEST['name'])){$from_name = stripslashes($_REQUEST['name']);}

$headers = "From: {$from_name} <{$_REQUEST['email']}>";

mail($my_email,$subject,$message,$headers);

// echo $my_email;
// echo $subject;
// echo $message;
// echo $headers;

?>

        <p>Su mensaje se envió exitosamente; nos pondremos en contacto con Ud. a la brevedad.</p>
