<!-- Main Home File -->
<?php
require_once 'database/db_connect.php';
require 'includes/header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <script src="<?php echo $GLOBALS['URL']?>scripts/slider.js"></script>
  <link rel="stylesheet" href="<?php echo $GLOBALS['URL']?>content/slider.css" type="slider/css">
</head>
<body>
  <div class="slider-container">
  <div class="slider-control left inactive"></div>
  <div class="slider-control right"></div>
  <ul class="slider-pagi"></ul>
  <div class="slider">
    <div class="slide slide-0 active">
      <div class="slide__bg"></div>
      <div class="slide__content">
        <svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
          <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" />
        </svg>
        <div class="slide__text">
          <h2 class="slide__text-heading">Website Design costs $450</h2>
          <p class="slide__text-desc">Delivering an aesthetically pleasing website.</p>
          <!-- retrieve the projects under website design  -->
          <a href=""
          class="slide__text-link">I want this job!</a>
        </div>
      </div>
    </div>
    <div class="slide slide-1 ">
      <div class="slide__bg"></div>
      <div class="slide__content">
        <svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
          <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" />
        </svg>
        <div class="slide__text">
          <h2 class="slide__text-heading">Mobile App Design costs $510</h2>
          <p class="slide__text-desc">Create a user-friendly mobile app.</p>
          <!-- retrieve the projects under mobile app design  -->
          <a href=""
          class="slide__text-link">I want this job!</a>
        </div>
      </div>
    </div>
    <div class="slide slide-2">
      <div class="slide__bg"></div>
      <div class="slide__content">
        <svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
          <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" />
        </svg>
        <div class="slide__text">
          <h2 class="slide__text-heading">Architecture design costs $540</h2>
          <p class="slide__text-desc">Let your creativity goes wild on the blueprint</p>
          <!-- retrieve the projects under architecture design  -->
          <a href=""
          class="slide__text-link">I want this job!</a>
        </div>
      </div>
    </div>
    <div class="slide slide-3">
      <div class="slide__bg"></div>
      <div class="slide__content">
        <svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
          <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" />
        </svg>
        <div class="slide__text">
          <h2 class="slide__text-heading">This drawing costs $320</h2>
          <p class="slide__text-desc">Make good use of your skills that deliver a grand art</p>
          <!-- retrieve the projects under designers and creatives design  -->
          <a href=""
          class="slide__text-link">I want this job!</a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="second">
  <section class="section_0">
    <div class="col-sm-3">
      <center><div class="circle"><a href="#section_4"></a></div><p>Mobile Development</p></center>
    </div>
    <div class="col-sm-3">
      <center><div class="circle"><a href="#section_4"></a></div><p>Website Development</p></center>
    </div>
    <div class="col-sm-3">
      <center><div class="circle"><a href="#section_4"></a></div><p>Designers & Creatives</p></center>
    </div>
    <div class="col-sm-3">
       <center><div class="circle"><a href="#section_4"></a></div><p>Writers</p></center>
    </div>
   </section>
  </div>
<div class="thead">
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
</div>
</body>
</html>

<?php
require 'includes/footer.php';
?>
