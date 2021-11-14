


$to      = 'mymail';
$subject = 'subject';
$message = 'hello';
$headers = 'From: mymail' . "\r\n" .
    'Reply-To: mymail' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
mail($to, $subject, $message, $headers);
 

$headers = "From: webmaster@example.com\r\n";
$headers .= "Reply-To: mymail\r\n";
$headers .= "Return-Path: mymail\r\n";
// $headers .= "CC: sombodyelse@example.com\r\n";
// $headers .= "BCC: hidden@example.com\r\n";

if ( mail($to,$subject,$message,$headers) ) {
   echo "The email has been sent!";
   } else {
   echo "The email has failed!";
   }
  
