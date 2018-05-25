<?php
//index.php
//include autoloader

require_once '../dompdf/autoload.inc.php';

//Connect to db
require_once '../database/db_connect.php';

//Retrieve all projects with associated company name
$queryProject = "select projects.project_title,projects.project_desc, project_owners.companyName from projects INNER JOIN project_owners ON project_owners.owner_id = projects.owner_id";
$resultProjectList = mysqli_query($link, $queryProject);

//reference the Dompdf namespace
use Dompdf\Dompdf;

//initialize dompdf class

$document = new Dompdf();

$output = '
<table>

<tr>
<th>Project Title</th>
<th>Project Owner</th>
<th>Project Description</th>
</tr>';

while($row = mysqli_fetch_array($resultProjectList)) {
    $output.= "<tr>";
    $output.= "<td>" . $row['project_title'] . "</td>";
    $output.= "<td>" . $row['companyName'] . "</td>";
    $output.= "<td>" . $row['project_desc'] . "</td>";
    $output.= "</tr>";
}

$output.= "</table>";

$document->loadhtml($output);
//$page = file_get_contents("");
//$document -> loadhtml($page);


//set page size and orientation
$document->setPaper('A4','portrait');

//Render the HTML as PDF
$document->render();

//get the output in browser
$document->stream("AllProjects",array("Attachment"=>0));
//1 = download
//0 = preview 


?>