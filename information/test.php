<?php
$to = 'isaact.tack@gmail.com';
$subject = 'Test mail';
$message = 'Hello hi there';

$mail_sent = mail($to, $subject, $message);
echo $mail_sent ? "Mail sent" : "Mail failed";
?>
