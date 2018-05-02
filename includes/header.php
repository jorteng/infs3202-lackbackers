<!-- Shared Header -->
<?php
// $GLOBALS['URL'] = "http://localhost/lackbackers/";
$GLOBALS['URL'] = "https://infs3202-3a14e833.uqcloud.net/lackbackers/";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Lackbackers Platform</title>
  <link rel="icon" href="<?php echo $GLOBALS['URL']?>images/favicon.png" type="image/png">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
  <link rel="stylesheet" href="<?php echo $GLOBALS['URL']?>content/text.css" type="text/css">

  <script>
  function myFunction() {
      var input, filter, ul, li, a, i;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      ul = document.getElementById("myUL");
      li = ul.getElementsByTagName("li");
      for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
          }
          else {
              li[i].style.display = "none";
              }
          }
        }

  </script>

</head>
<body>
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="body-content">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div>
                 <link rel="shortcut icon" href="<?php echo $GLOBALS['URL']?>images/favicon.png" /><a href="index.php"></a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo $GLOBALS['URL']?>index.php">Home</a></li>
                    <li><a href="<?php echo $GLOBALS['URL']?>projects/allprojects.php">Projects</a></li>
                    <li><a href="<?php echo $GLOBALS['URL']?>information/aboutus.php">About Us</a></li>
                    <li><a href="<?php echo $GLOBALS['URL']?>information/faq.php">FAQ</a></li>
                    <li><a href="<?php echo $GLOBALS['URL']?>information/rss.php">RSS</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                  <li><form class="navbar-form" role="search">
                      <div class="input-group">
                      <!--  <input type="text" size="30" onkeyup="showResult(this.value)" placeholder="Search for projects.." title="Type in a project" style="border: 6px solid white;">
                        <div id="search"></div>-->
                        <input type="text" id="myinput" onkeyup="myFunction()" placeholder="Search for projects.." title="Type in a project name" style="border: 6px solid white;">
                        <div class="input-group-btn"><button class="btn btn-primary" type="submit"><i class=" glyphicon glyphicon-search"></i></button></div>
                      </div>
                    </form>
                  </li>
                <?php if(!isset($_SESSION['email']) || empty($_SESSION['email'])){ ?>
                <li><a href="<?php echo $GLOBALS['URL']?>accounts/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                <?php } ?>
                <?php if (isset($_SESSION['email'])) { ?>
                <div class="dropdown">
                  <button class="dropbtn"><p>Welcome, <b><?php echo htmlspecialchars($_SESSION['name']); ?></b><span class="glyphicon glyphicon-menu-down"></span></p></button>
                  <div class="dropdown-content">
                    <a href="<?php echo $GLOBALS['URL']?>profile/viewprofile.php">My Profile</a>
                    <a href="<?php echo $GLOBALS['URL']?>projects/myprojects.php">My Projects</a>
					<?php if($_SESSION['userType']==1){?>
					<a href="<?php echo $GLOBALS['URL']?>projects/createProject.php">Create Project</a> <?php } ?>
                    <a href="<?php echo $GLOBALS['URL']?>accounts/logout.php">Sign Out</a>
                  </div>
                </div>

                  <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
