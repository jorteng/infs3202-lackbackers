<!-- Retrieve Projects AJAX File-->
<?php
session_start();
$q = intval($_GET['q']);
require_once '../database/db_connect.php';

//Ajax for retrieving project list
mysqli_select_db($link,"project_list");
$ajaxProjectlist="select projects.project_title,projects.project_desc, projects.photoPath, project_owners.companyName from projects, project_owners WHERE project_id = '".$q."' AND project_owners.owner_id = projects.owner_id";
$ajaxProjectlistresult = mysqli_query($link,$ajaxProjectlist);
?>

<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
        <?php while($row = mysqli_fetch_array($ajaxProjectlistresult)):?>
            <?php echo $row['project_title']. "</br>";?>
            <?php echo $row['companyName']. "</br>";?>
            <?php echo $row['project_desc']. "</br>";?>
			<?php echo "<a href='" . $row['photoPath']. "' target=\"_blank\">Click here for project photo</a></br><hr>";?>
        <?php endwhile ?>
		<form onsubmit="return confirm('Do you really want to delete the project?');" action="deleteproject.php" method="POST">
			<?php if($_SESSION['userType']==1){?>
			<input type="submit" class="btn btn-primary" value="Delete Project"/><?php } ?>
			<input type="text" name="projectid" class="form-control" value=" <?php echo $q; ?>" style="display:none">
		</form>

</body>

</html>
