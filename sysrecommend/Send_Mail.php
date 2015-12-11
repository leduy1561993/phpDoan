<?php
function Send_Mail($to,$subject,$body)
{
$from       = 'leduy1561993@gmail.com';
require 'PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail = new PHPMailer(true);
$mail->CharSet = "UTF-8";
$mail->IsSMTP(); // set mailer to use SMTP
$mail->Host = "smtp.gmail.com"; // specify main and backup server
$mail->Port = 465; // set the port to use
$mail->SMTPAuth = true; // turn on SMTP authentication
$mail->SMTPSecure = 'ssl';
//$mail->Username = ""; // your SMTP username or your gmail username
//$mail->Password = ""; // your SMTP password or your gmail password



$mail->From = $from;
$mail->FromName = $from; // Name to indicate where the email came from when the recepient received
$mail->AddAddress($to,"test");
$mail->AddReplyTo($from,"Test");
$mail->WordWrap = 50; // set word wrap
$mail->IsHTML(true); // send as HTML

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

//$mail->isSMTP();                                      // Set mailer to use SMTP
//$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
//$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username   = 'leduy1561993';  // SMTP  username
$mail->Password   = 'Leduy15>';
//$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
//$mail->Port = 587;                                    // TCP port to connect to

//$mail->setFrom('leduy1561993', 'Mailer');
//$mail->addAddress($to, 'Joe User');     // Add a recipient
//$mail->addReplyTo($from, 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
//$mail->isHTML(true);                                  // Set email format to HTML

//$mail->Subject = "=?UTF-8?B?".base64_encode($subject)."?=";
$mail->Subject = $subject;
$mail->Body    = $body;
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
}
?>