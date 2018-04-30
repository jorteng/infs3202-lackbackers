<?php
//Connect to db
require_once '../database/db_connect.php';
require '../includes/header.php';

//Dropdown list for Project Selection
$queryProject = "SELECT * FROM `projects`";
$resultProjectList = mysqli_query($link, $queryProject);
?>
<!DOCTYPE html>
<html>
<head>


<script>
function showUser(str) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHint").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","getallproject.php?q="+str,true);
  xmlhttp.send();
}
</script>
</head>

<body>
<div class="second">
  <form>
      <select name="projects" onchange="showUser(this.value)">
        <option value="">Select a project</option>
        <?php while($row1 = mysqli_fetch_array($resultProjectList)):;?>
          <option value="<?php echo $row1[0];?>"><?php echo $row1[1];?></option>
        <?php endwhile;?>
      </select>
</form>

  <div id="txtHint"></div>
</div>

</body>
</html>

<?php
require '../includes/footer.php';
?>
