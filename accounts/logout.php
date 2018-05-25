<!-- Logout File -->
<?php
session_start();
//Destroy all Sessions
if(session_destroy()) {
  header("location: /lackbackers");
  exit;
}
?>
