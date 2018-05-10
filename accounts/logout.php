<?php
session_start();
//Destroy all Sessions
if(session_destroy()) {
  header("location: /lackbackers");
  // header('location: /infs3202-lackbackers');
  exit;
}
?>
