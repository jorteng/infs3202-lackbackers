<?php
   require_once 'credentials.php';
    //Create connection
    $link = mysqli_connect($servername, $username, $password, $db_name);

    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to database: " . mysqli_connect_error();
    }
    ?>
