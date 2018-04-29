<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
$q = intval($_GET['q']);
require_once '../database/db_connect.php';

echo "<table>
<tr>
<th>Project Title</th>
<th>Project Owner</th>
<th>Project Description</th>
</tr>";
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
