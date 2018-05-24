<?php
$q = intval($_GET['q']);
require_once '../database/db_connect.php';

//Ajax for retrieving project list
mysqli_select_db($link,"project_list");
$ajaxProjectlist="select projects.project_title,projects.project_desc, project_owners.companyName from projects, project_owners WHERE project_id = '".$q."' AND project_owners.owner_id = projects.owner_id";
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
            <?php echo $row['project_desc']. "</br><hr>";?>
        <?php endwhile ?>
</body>
</html>
