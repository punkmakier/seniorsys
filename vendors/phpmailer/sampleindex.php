<?php
require_once("class.phpmailer.php");

$mail = new PHPMailer();

	$mail->IsSMTP();                                // send via SMTP
	$mail->Host     = "172.20.106.25"; 				// SMTP servers
	$mail->SMTPAuth = true;     					// turn on SMTP authentication
	$mail->Username = "cas.mailer@calltekcenter.com";  // SMTP username
	$mail->Password = "C4llT3k043!!"; 				// SMTP password
	$mail->From     = "chris.mailer@calltekcenter.com";

    $mail->AddAddress('ctc_draco@mail2.calltekcenter.com');               // Name is optional

    $mail->isHTML(true);                                  // Set email format to HTML
    
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    
    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }

?>