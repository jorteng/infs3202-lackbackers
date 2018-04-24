<!-- Shared Header -->
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
                </ul>
                <ul class="nav navbar-nav navbar-right">
                <!-- <li><input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name"></li>
                <li><input type="image" src="<?php echo $GLOBALS['URL']?>images/search.png" alt="Submit" width="18" height="18" style="color="white""></li> -->
                <li><a href="<?php echo $GLOBALS['URL']?>accounts/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
