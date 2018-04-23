<!-- Main Home File -->
<?php
// $GLOBALS['URL'] = "http://localhost/infs3202-lackbackers/";
$GLOBALS['URL'] = "https://infs3202-3a14e833.uqcloud.net/lackbackers/";
require_once '../database/db_connect.php';
require '../includes/header.php';
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="icon" href="images/favicon.png" type="image/png">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="content/text.css" type="text/css">

<style>
body {
    font-family: "Lato", sans-serif;
}

.sidenavt {
    width: 130px;
    position: fixed;
    z-index: 1;
    top: 20px;
    left: 10px;
    background: #eee;
    overflow-x: hidden;
    padding: 8px 0;
}

.sidenavt a {
    padding: 6px 8px 6px 16px;
    text-decoration: none;
    font-size: 14px;
    color: #2196F3;
    display: block;
}

.sidenavt a:hover {
    color: #064579;
}

.main {
    margin-left: 140px; /* Same width as the sidebar + left position in px */
    font-size: 28px; /* Increased text to enable scrolling */
    padding: 0px 10px;
}

@media screen and (max-height: 450px) {
    .sidenavt {padding-top: 15px;}
    .sidenavt a {font-size: 18px;}
}
</style>
</head>
<body>

<div class="sidenavt">
  <a href="#about">How to get hired for a project</a>
  <a href="#services">How to ensure that the company owner the project is trustworthy?</a>
</div>

<div class="main">
  <h2>Frequently Asked Questions</h2>
  <p>This sidebar is as tall as its content (the links), and is always shown.</p>
  <p>Scroll down the page to see the result.</p>
</div>

</body>
</html>

<?php
require '../includes/footer.php';
?>
