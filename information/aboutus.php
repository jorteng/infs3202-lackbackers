<!-- About Us File -->
<?php
require_once '../database/db_connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php require '../includes/resources.php';?>
  <script>
    function initMap() {
      var lackBack = new google.maps.LatLng(-27.4983477, 153.0123124);
      var map = new google.maps.Map(document.getElementById('map'), {
      center: lackBack,
      zoom: 12,
      scrollwheel: false,
      mapTypeControl: false,
      fullscreenControl: false,
      streetViewControl: false,
      navigationControl: false,
      scaleControl: false,
      mapTypeId: 'roadmap'
      });
      var marker = new google.maps.Marker({
        position: lackBack,
        map: map
      });
    }
  </script>
  // Enter your Google API here for the map to work
  <script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBctTtjL3tGAJ2KZ191-8ClCRIpRZgNPz4&callback=initMap">
  </script>
</head>

<body>
  <?php require '../includes/header.php';?>
  <div class="second">
    <h3>Lackbackers Headquarters</h3>
        <div align="center" id="map"></div></br>
        <div class="container aboutus">
          <div class="col-md-6 col-md-offset-3">
            <div class="well well-sm">
              <form class="form-horizontal" method="POST">
              <fieldset>
                <legend class="text-center">Contact Us</legend>

                <!-- Name input-->
                <div class="form-group">
                  <label class="col-md-3 control-label" for="name">Name</label>
                  <div class="col-md-9">
                    <input id="name" name="name" type="text" placeholder="Your name" class="form-control">
                  </div>
                </div>

                <!-- Email input-->
                <div class="form-group">
                  <label class="col-md-3 control-label" for="email">E-mail Address</label>
                  <div class="col-md-9">
                    <input id="email" name="email" type="text" placeholder="Your email" class="form-control">
                  </div>
                </div>

                <!-- Message body -->
                <div class="form-group">
                  <label class="col-md-3 control-label" for="message">Subject</label>
                  <div class="col-md-9">
                    <textarea class="form-control" id="message" name="message" placeholder="Please enter your message here..." rows="5"></textarea>
                  </div>
                </div>

                <!-- Form actions -->
                <div class="form-group">
                  <div class="col-md-12 text-right">
                    <button type="submit" class="btn btn-primary btn-lg" onclick="alert(\'<?php echo $msg;?>\')" value="Send">Submit</button>
                  </div>
                </div>
              </fieldset>
              </form>
            </div>
          </div>
    </div>
    </div>

</body>
<?php
/**
 * This example shows how to handle a simple contact form.
 */
//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$msg = '';
//Don't run this unless we're handling a form submission
    require '../vendor/autoload.php';
    //Create a new PHPMailer instance
    $mail = new PHPMailer(true);
    //Tell PHPMailer to use SMTP - requires a local mail server
    //Faster and safer than using mail()
    // $mail->SMTPDebug = 2;
    $mail->isSMTP();
    $mail->Host = 'mailhub.eait.uq.edu.au';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 25;

    $mail->setFrom('noreply@uq.edu.au', 'UQ EAIT');
    //Send the message to yourself, or whoever should receive contact for submissions
    $mail->addAddress('r.roesly@uqconnect.edu.au', 'Rachel Roesly');
	$mail->addAddress($_POST['email'], $_POST['name']);
    //Put the submitter's address in a reply-to header
    //This will fail if the address provided is invalid,
    //in which case we should ignore the whole request
    if ($mail->addReplyTo($_POST['email'], $_POST['name'])) {
        $mail->Subject = 'PHPMailer contact form';
        //Keep it simple - don't use HTML
        $mail->isHTML(false);
        //Build a simple message body
        $mail->Body = <<<EOT
Email: {$_POST['email']}
Name: {$_POST['name']}
Message: {$_POST['message']}
EOT;
        //Send the message, check for errors
        if (!$mail->send()) {
            //The reason for failing to send will be in $mail->ErrorInfo
            //but you shouldn't display errors to users - process the error, log it on your server.
            $msg = 'Sorry, something went wrong. Please try again later.';
        } else {
            $msg = 'Message sent! Thanks for contacting us.';
        }
    } else {
        $msg = 'Invalid email address, message ignored.';
    }

if (!empty($msg)) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';}

?>
</html>
