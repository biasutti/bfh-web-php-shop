<?php
require 'src/PHPMailer.php';
require 'src/SMTP.php';

$mail = new PHPMailer\PHPMailer\PHPMailer();

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'bfhdrinkweb@gmail.com';
$mail->Password = 'Dr!nk$h0p';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;
$mail->From = 'bfhdrinkweb@gmail.com';
$mail->FromName = 'Drink Webshop Barthe Biasutti';
//send to:
/*$mail->addAddress('barts5@bfh.ch', 'Barthe');
$mail->isHTML(true);
$mail->Subject = 'Drink shop email validation';
$mail->Body = 'temporary body where we can write html';
$mail->AltBody = 'The body in plain text for non-HTML mail clients';
if(!$mail->send()) echo 'Sending message failed: ' . $mail->ErrorInfo;
else echo 'Message has been sent successfully';
*/
