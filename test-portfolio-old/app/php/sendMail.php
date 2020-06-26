<?php
require_once('config.php');
function sendEmail($name, $email, $sub, $body){

$mail = new PHPMailer\PHPMailer\PHPMailer;                           // Passing `true` enables exceptions
	try {

   	 //Recipients
    	$mail->setFrom($name, $email);
    	$mail->addAddress('hanck@mail.com', 'Ali');     // Add a recipient
    	//Content
    	$mail->isHTML(true);                                  // Set email format to HTML
    	$mail->Subject = $sub;
    	$mail->Body    = $body;
    	$mail->AltBody = $body;

    	$mail->send();
    		return($body);
		} catch (Exception $e) {
    		return('Message could not be sent. Mailer Error: ');
			};
	};