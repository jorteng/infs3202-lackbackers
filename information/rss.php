<!-- RSS File -->
<?php
require_once '../database/db_connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php require '../includes/resources.php';?>
<script>
function showRSS(str) {
  if (str.length==0) {
    document.getElementById("rssOutput").innerHTML="";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("rssOutput").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","getrss.php?q="+str,true);
  xmlhttp.send();
}
</script>
</head>
<body>
  <?php require '../includes/header.php';?>
<div class="second">
  <form>
    <select onchange="showRSS(this.value)">
      <option value="">Select an RSS-feed:</option>
      <option value="Test">IT Jobs</option>
    </select>
  </form>
  <div id="rssOutput"></div>
  </div>


</body>
</html>
