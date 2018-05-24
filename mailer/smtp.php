<?php
require_once 'database/db_connect.php';
require_once "vendor/autoload.php";
$recipientmail = $recipientname = $mailsubject = $mailmessage = "";

$mail = new PHPMailer;

//Enable SMTP debugging.
$mail->SMTPDebug = 3;
//Set PHPMailer to use SMTP.
$mail->isSMTP();
//Set SMTP host name
$mail->Host = "smtp.gmail.com";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;
//Provide username and password
$mail->Username = "lackbackinfs3202@gmail.com";
$mail->Password = "passwordl@ck5";
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "tls";
//Set TCP port to connect to
$mail->Port = 587;

$mail->From = "lackbackinfs3202@gmail.com";
$mail->FromName = "Lackbackers";

$mail->addAddress($recipientmail, $recipientname);

$mail->isHTML(true);

$mail->Subject = $mailsubject;
$mail->Body = $mailmessage;
$mail->AltBody = "This is the plain text version of the email content";

if(!$mail->send())
{
    echo "Mailer Error: " . $mail->ErrorInfo;
}
else
{
    echo "Message has been sent successfully";
}
?>
<html>
<body>
  <form id="emailForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
      <div class="form-group <?php echo (!empty($recipientmail_err)) ? 'has-error' : ''; ?>">
          <label>Email you want to contact us with</label>
          <input type="text" name="recipientmail" class="form-control" value="<?php echo $recipientmail; ?>">
          <span class="help-block"><?php echo $recipientmail_err; ?></span>
      </div>
      <div class="form-group <?php echo (!empty($recipientname_err)) ? 'has-error' : ''; ?>">
          <label>Your name</label>
          <input type="text" name="recipientname" class="form-control" value="<?php echo $recipientname; ?>">
          <span class="help-block"><?php echo $recipientname_err; ?></span>
      </div>
      <div class="form-group <?php echo (!empty($mailsubject_err)) ? 'has-error' : ''; ?>">
          <label>Title</label>
          <input type="text" name="recipientname" class="form-control" value="<?php echo $mailsubject; ?>">
          <span class="help-block"><?php echo $mailsubject_err; ?></span>
      </div>
      <div class="form-group <?php echo (!empty($mailmessage_err)) ? 'has-error' : ''; ?>">
          <label>Message</label>
          <input type="text" name="recipientname" class="form-control" value="<?php echo $mailmessage; ?>">
          <span class="help-block"><?php echo $mailmessage_err; ?></span>
      </div>
      <div class="form-group">
          <input id="submitRegister" type="submit" class="btn btn-primary" value="Submit">
          <input id="resetRegister" type="reset" class="btn btn-default" value="Reset">
      </div>
</body>
</html>
