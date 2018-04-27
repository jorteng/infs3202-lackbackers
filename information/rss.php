<!-- RSS File -->
<?php
// $GLOBALS['URL'] = "http://localhost/infs3202-lackbackers/";
$GLOBALS['URL'] = "https://infs3202-3a14e833.uqcloud.net/lackbackers/";
require_once '../database/db_connect.php';
require '../includes/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
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
<div class="second">
  <form>
    <select onchange="showRSS(this.value)">
      <option value="">Select an RSS-feed:</option>
      <option value="Test">Test</option>
      <option value="NBC">NBC News</option>
    </select>
  </form>
  <br>
  <div id="rssOutput">RSS-feed will be listed here...</div>
</div>
</body>
</html>
