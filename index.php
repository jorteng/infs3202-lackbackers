<!-- Main Home File -->
<?php
require_once 'database/db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require 'includes/resources.php';?>
</head>
<body>
  <?php require 'includes/header.php';?>
  <div id=main_slider>
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
          <form id="f_slider" method="GET" action="<?php echo $GLOBALS['URL']?>projects/retrieveProjects.php">
            <input type="hidden" name="search" value ="website"/>
            <a href="#" onclick="document.getElementById('f_slider').submit()"class="slide__text-link">I want this job!</a>
          </form>
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
          <form id="s_slider" method="GET" action="<?php echo $GLOBALS['URL']?>projects/retrieveProjects.php">
            <input type="hidden" name="search" value ="mobile"/>
            <a href="#" onclick="document.getElementById('s_slider').submit()"class="slide__text-link">I want this job!</a>
          </form>
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
          <p class="slide__text-desc">Let your creativity goes wild on the blueprint.</p>
          <form id="t_slider" method="GET" action="<?php echo $GLOBALS['URL']?>projects/retrieveProjects.php">
            <input type="hidden" name="search" value ="architecture"/>
            <a href="#" onclick="document.getElementById('t_slider').submit()"class="slide__text-link">I want this job!</a>
          </form>
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
          <h2 class="slide__text-heading">Logo Design costs $350</h2>
          <p class="slide__text-desc">Make good use of your skills that deliver a grand art.</p>
          <form id="ft_slider" method="GET" action="<?php echo $GLOBALS['URL']?>projects/retrieveProjects.php">
            <input type="hidden" name="search" value ="logo"/>
            <a href="#" onclick="document.getElementById('ft_slider').submit()"class="slide__text-link">I want this job!</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<div class="second">
  <center><h2>Here are some of our most popular projects:</h2></center>
  <section class="section_0">
    <div class="col-sm-3">
      <form id="f_circle" method="GET" action="<?php echo $GLOBALS['URL']?>projects/retrieveProjects.php">
        <input type="hidden" name="search" value ="mobile"/>
        <center><a href="#" class="circle" onclick="document.getElementById('f_circle').submit()" type="text">Mobile Development</a></center>
      </form>
    </div>
    <div class="col-sm-3">
      <form id="s_circle" method="GET" action="<?php echo $GLOBALS['URL']?>projects/retrieveProjects.php">
        <input type="hidden" name="search" value ="website"/>
        <center><a href="#" class="circle" onclick="document.getElementById('s_circle').submit()" type="text">Website Development</a></center>
      </form>
    </div>
    <div class="col-sm-3">
      <form id="t_circle" method="GET" action="<?php echo $GLOBALS['URL']?>projects/retrieveProjects.php">
        <input type="hidden" name="search" value ="design"/>
        <center><a href="#" class="circle" onclick="document.getElementById('t_circle').submit()" type="text">Creative Designs</a></center>
      </form>
    </div>
    <div class="col-sm-3">
      <form id="ft_circle" method="GET" action="<?php echo $GLOBALS['URL']?>projects/retrieveProjects.php">
        <input type="hidden" name="search" value ="writing"/>
        <center><a href="#" class="circle" onclick="document.getElementById('ft_circle').submit()" type="text">Creative Writings</a></center>
      </form>
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
</body>
<?php
require 'includes/footer.php';
?>
</html>
