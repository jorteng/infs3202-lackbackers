<?php
require_once '../database/db_connect.php';

$q = intval($_GET['q']);

//Ajax for retrieving project list
mysqli_select_db($link,"project_list");
$ajaxProjectlist="select projects.project_title,projects.project_desc, project_owners.companyName from projects, project_owners WHERE project_id = '".$q."' AND project_owners.owner_id = projects.owner_id";
$ajaxProjectlistresult = mysqli_query($link,$ajaxProjectlist);
?>
<!DOCTYPE html>
<html>
<head>
    <?php require '../includes/resources.php';?>
</head>
<body>
    <?php require '../includes/header.php';?>
<table>

<tr>
<th>Project Title</th>
<th>Project Owner</th>
<th>Project Description</th>
</tr>

<?php
while($row = mysqli_fetch_array($ajaxProjectlistresult)) {
    echo "<tr>";
    echo "<td>" . $row['project_title'] . "</td>";
    echo "<td>" . $row['companyName'] . "</td>";
    echo "<td>" . $row['project_desc'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($link);
?>
</body>
</html>
