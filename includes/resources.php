<?php
// $GLOBALS['URL'] = "http://localhost/infs3202-lackbackers/";
$GLOBALS['URL'] = "https://infs3202-3a14e833.uqcloud.net/lackbackers/";
?>
<link rel="icon" href="<?php echo $GLOBALS['URL']?>images/favicon.png" type="image/png">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css"> -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="<?php echo $GLOBALS['URL']?>scripts/slider.js"></script>
<link rel="stylesheet" href="<?php echo $GLOBALS['URL']?>content/slider.css">
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
