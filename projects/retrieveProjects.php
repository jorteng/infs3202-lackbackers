<!-- Welcome <?php echo $_GET["search"]; ?>.<br /> -->
<?php
$search = $_GET["search"];

require_once '../database/db_connect.php';

// get all projects
$queryProject = "SELECT * FROM `projects`";
$resultProjectList = mysqli_query($link, $queryProject);
// get all projects by categories
$filterproject = "select projects.project_title,projects.project_desc, projects.photoPath, project_owners.companyName from projects, project_owners WHERE project_owners.owner_id = projects.owner_id AND project_title like '%".$search."%'";
$filterresult = mysqli_query($link,$filterproject);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require '../includes/resources.php';?>
    <script>
    function showUser(str) {
      if (str.length==0) {
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
      xmlhttp.open("GET","retrieveallprojects.php?q="+str,true);
      xmlhttp.send();
    }
    </script>
</head>
<body>
    <?php require '../includes/header.php';?>
    <div class="second">
      <form method="GET">
      <div class="input-group stylish-input-group">
            <input type="text" class="form-control" name="search" placeholder="Search">
            <span class="input-group-addon">
            <button class="icon-button" type="submit"><span class="glyphicon glyphicon-search"></span></button>
          </span>
        </div>
      </form></br>
        <div="row">
        <div class="col-sm-4">
          <div class="panel panel-primary">
            <div class="panel-heading">Filter by</div>
            <div class="panel-body">
              Project Title</br>
              <form>
                  <select name="projects" onchange="showUser(this.value)">
                    <option value="">Select a project</option>
                    <?php while($row1 = mysqli_fetch_array($resultProjectList)):;?>
                    <option value="<?php echo $row1[0];?>"><?php echo $row1[1];?></option>
                    <?php endwhile;?>
                  </select>
              </form>
              <form target='_blank' action="../projects/projectspdf.php">
              </br><input type="submit" class="btn btn-primary" value="Download as PDF" />
              </form>
            </div>
          </div>
      </div>
      <div class="col-sm-8">
      <div class="panel panel-primary">
      <div class="panel-heading"> Project Lists </div>
      <div id="txtHint" class="panel-body">
        <?php while($row = mysqli_fetch_array($filterresult)):;?>
            <?php echo $row['project_title']. "</br>";?>
            <?php echo $row['companyName']. "</br>";?>
            <?php echo $row['project_desc']. "</br>";?>
			<?php echo "<a href='" . $row['photoPath']. "'>Click here for project photo</a></br><hr>";?>
        <?php endwhile; ?>
      </div>
    </div>
  </div>
  </div>
</div>
</body>
</html>
<?php
require '../includes/footer.php';
?>
