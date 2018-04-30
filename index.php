<!-- Main Home File -->
<?php
require_once 'database/db_connect.php';
require 'includes/header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<script type="text/javascript">
  $(document).ready(function() {

  var $slider = $(".slider"),
    $slideBGs = $(".slide__bg"),
    diff = 0,
    curSlide = 0,
    numOfSlides = $(".slide").length - 1,
    animating = false,
    animTime = 500,
    autoSlideTimeout,
    autoSlideDelay = 6000,
    $pagination = $(".slider-pagi");

  function createBullets() {
    for (var i = 0; i < numOfSlides + 1; i++) {
      var $li = $("<li class='slider-pagi__elem'></li>");
      $li.addClass("slider-pagi__elem-" + i).data("page", i);
      if (!i) $li.addClass("active");
      $pagination.append($li);
    }
  };

  createBullets();

  function manageControls() {
    $(".slider-control").removeClass("inactive");
    if (!curSlide) $(".slider-control.left").addClass("inactive");
    if (curSlide === numOfSlides) $(".slider-control.right").addClass("inactive");
  };

  function autoSlide() {
    autoSlideTimeout = setTimeout(function() {
      curSlide++;
      if (curSlide > numOfSlides) curSlide = 0;
      changeSlides();
    }, autoSlideDelay);
  };

  autoSlide();

  function changeSlides(instant) {
    if (!instant) {
      animating = true;
      manageControls();
      $slider.addClass("animating");
      $slider.css("top");
      $(".slide").removeClass("active");
      $(".slide-" + curSlide).addClass("active");
      setTimeout(function() {
        $slider.removeClass("animating");
        animating = false;
      }, animTime);
    }
    window.clearTimeout(autoSlideTimeout);
    $(".slider-pagi__elem").removeClass("active");
    $(".slider-pagi__elem-" + curSlide).addClass("active");
    $slider.css("transform", "translate3d(" + -curSlide * 100 + "%,0,0)");
    $slideBGs.css("transform", "translate3d(" + curSlide * 50 + "%,0,0)");
    diff = 0;
    autoSlide();
  }

  function navigateLeft() {
    if (animating) return;
    if (curSlide > 0) curSlide--;
    changeSlides();
  }

  function navigateRight() {
    if (animating) return;
    if (curSlide < numOfSlides) curSlide++;
    changeSlides();
  }

  $(document).on("mousedown touchstart", ".slider", function(e) {
    if (animating) return;
    window.clearTimeout(autoSlideTimeout);
    var startX = e.pageX || e.originalEvent.touches[0].pageX,
      winW = $(window).width();
    diff = 0;

    $(document).on("mousemove touchmove", function(e) {
      var x = e.pageX || e.originalEvent.touches[0].pageX;
      diff = (startX - x) / winW * 70;
      if ((!curSlide && diff < 0) || (curSlide === numOfSlides && diff > 0)) diff /= 2;
      $slider.css("transform", "translate3d(" + (-curSlide * 100 - diff) + "%,0,0)");
      $slideBGs.css("transform", "translate3d(" + (curSlide * 50 + diff / 2) + "%,0,0)");
    });
  });

  $(document).on("mouseup touchend", function(e) {
    $(document).off("mousemove touchmove");
    if (animating) return;
    if (!diff) {
      changeSlides(true);
      return;
    }
    if (diff > -8 && diff < 8) {
      changeSlides();
      return;
    }
    if (diff <= -8) {
      navigateLeft();
    }
    if (diff >= 8) {
      navigateRight();
    }
  });

  $(document).on("click", ".slider-control", function() {
    if ($(this).hasClass("left")) {
      navigateLeft();
    } else {
      navigateRight();
    }
  });

  $(document).on("click", ".slider-pagi__elem", function() {
    curSlide = $(this).data("page");
    changeSlides();
  });

});

</script>
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

  <!-- <div class="overlaytext">
     Dear freelancers, Help is here! Millions of jobs online ready for grab.
    <p><a href="<?php echo $GLOBALS['URL']?>accounts/register.php" class="btn btn-primary btn-lg">Get Hired &raquo;</a>
      <a href="<?php echo $GLOBALS['URL']?>accounts/register.php" class="btn btn-primary btn-lg">Hire Experts &raquo;</a>
    </p>
  </div>
</div> -->

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
</body>
</html>

<?php
require 'includes/footer.php';
?>
