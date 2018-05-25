<!-- Shared Header File-->
<?php
session_start();
?>
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
                <li><a href="<?php echo $GLOBALS['URL']?>projects/retrieveProjects.php">Projects</a></li>
                <li><a href="<?php echo $GLOBALS['URL']?>learning/learningMods.php">Learn</a></li>
                <li><a href="<?php echo $GLOBALS['URL']?>information/aboutus.php">About Us</a></li>
                <li><a href="<?php echo $GLOBALS['URL']?>information/faq.php">FAQ</a></li>
                <li><a href="<?php echo $GLOBALS['URL']?>information/rss.php">RSS</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li>
                <form class="navbar-form" method="GET" action="<?php echo $GLOBALS['URL']?>projects/retrieveProjects.php">
                  <div class="input-group stylish-input-group">
                    <input type="text" class="form-control" name="search" placeholder="Search for projects.." title="Type in a project name" style="border: 6px solid white;">
                    <div class="input-group-btn"><button class=" btn btn-primary" type="submit"><span class="icon-button glyphicon glyphicon-search"></span></button></div>
                  </div>
                </form>
              </li>
            <?php if(!isset($_SESSION['email']) || empty($_SESSION['email'])){ ?>
            <li><a href="<?php echo $GLOBALS['URL']?>accounts/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            <?php } ?>
            <?php if (isset($_SESSION['email'])) { ?>
            <div class="dropdown">
              <button class="dropbtn"><p id ="refresh">Welcome, <b><?php echo htmlspecialchars($_SESSION['name']); ?></b><span class="glyphicon glyphicon-menu-down"></span></p></button>
              <div class="dropdown-content">
                <?php
                  if ($_SESSION['userType'] == 1){
                      echo "<a href='" . $GLOBALS['URL'] . "profile/ownerprofile.php'> My Profile </a>";
                  } else {
                      echo "<a href='" . $GLOBALS['URL'] . "profile/freelancerprofile.php'> My Profile </a>";
                  }?>
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
