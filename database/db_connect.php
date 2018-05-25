<!-- Main Database File -->
<?php
require_once 'credentials.php';
//Create connection
$link = new mysqli($servername, $username, $password, $db_name);

// Check connection
if ($link->connect_error) {
  die ("Failed to connect to database: " . $link->connect_error);
}
?>
