<!-- Main Home File -->
<?php
$GLOBALS['URL'] = "http://localhost/infs3202-lackbackers/";
require_once 'database/db_connect.php';
require 'includes/header.php';
// *$GLOBALS['URL'] = "https://infs3202-3a14e833.uqcloud.net/lackbackers";*/
?>

<!DOCTYPE html>
<html lang="en">

<head>
<script>
  var slideIndex = 1;
  showDivs(slideIndex);

  function plusDivs(n) {
    showDivs(slideIndex += n);
  }

  function currentDiv(n) {
    showDivs(slideIndex = n);
  }

  function showDivs(n) {
    var i;
    var x = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("demo");
    if (n > x.length) {slideIndex = 1}
    if (n < 1) {slideIndex = x.length}
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
       dots[i].className = dots[i].className.replace(" w3-white", "");
    }

    x[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " w3-white";
}
</script>

</head>

<div class="jumbotron">
  <!-- <div class="overlay">
      <div class="w3-content w3-display-container" style="max-width:800px">
        <img class="mySlides" src="slide1.jpg" style="width:100%">
        <img class="mySlides" src="slide2.jpg" style="width:100%">
        <img class="mySlides" src="slide3.jpg" style="width:100%">
        <div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-bottommiddle" style="width:100%">
          <div class="w3-left w3-hover-text-khaki" onclick="plusDivs(-1)">&#10094;</div>
          <div class="w3-right w3-hover-text-khaki" onclick="plusDivs(1)">&#10095;</div>
          <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(1)"></span>
          <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(2)"></span>
          <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(3)"></span>
        </div>
      </div>
  </div> -->
</div>

  <div class="overlaytext">
     Dear freelancers, Help is here! Millions of jobs online ready for grab.
    <p><a href="<?php echo $GLOBALS['URL']?>projects/allprojects.php" class="btn btn-primary btn-lg">Get Hired &raquo;</a>
      <a href="<?php echo $GLOBALS['URL']?>projects/myprojects.php" class="btn btn-primary btn-lg">Hire Experts &raquo;</a>
    </p>
  </div>
</div>

<div class="second">
        <div class="col-md-4">
            <center>
            <span class="glyphicon glyphicon-plus hicon"></span>&nbsp;
            <h3 class="headtext">100% Satisfaction</h3>&nbsp;
            <p class="bodytext">Simply sign up for the posted job and ready to get your competitive bids within minutes!</p>
            </center>
        </div>
        <div class="col-md-4">
          <center>
            <span class="glyphicon glyphicon-cloud hicon"></span>&nbsp;
            <h3 class="headtext">On-the-go</h3>&nbsp;
            <p class="bodytext">Many jobs to sign up from different industries. Starting from web design to admin.</p>
          </center>
        </div>
        <div class="col-md-4">
          <center>
            <span class="glyphicon glyphicon-bell hicon"></span>&nbsp;
            <h3 class="headtext">24/7 Availability</h3>&nbsp;
            <p class="bodytext">We provide 24/7 supports to have a live chat with the freelancers for any updates on the work.</p>
          <center>
        </div>
</div>
    <div class="thead">
      <h2>Top Categories</h2>
        <div class="col-md-4">
          <center>
            <span class="glyphicon glyphicon-plus hicon"></span>&nbsp;
            <h3 class="headtext">100% Satisfaction</h3>&nbsp;
            <p class="bodytext">Simply sign up for the posted job and ready to get your competitive bids within minutes!</p>
          </center>
        </div>
      <div class="col-md-4">
        <center>
          <span class="glyphicon glyphicon-cloud hicon"></span>&nbsp;
          <h3 class="headtext">On-the-go</h3>&nbsp;
          <p class="bodytext">Many jobs to sign up from different industries. Starting from web design to admin.</p>
        </center>
      </div>
      <div class="col-md-4">
        <center>
          <span class="glyphicon glyphicon-bell hicon"></span>&nbsp;
          <h3 class="headtext">24/7 Availability</h3>&nbsp;
          <p class="bodytext">We provide 24/7 supports to have a live chat with the freelancers for any updates on the work.</p>
          <center>
      </div>
    </div>

    <div class="second body-content">
        <h2>Featured Projects</h2>
    </div>
</div>
</html>

<?php
require 'includes/footer.php';
?>
