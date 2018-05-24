<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	require_once '../database/db_connect.php';

	//Ajax for retrieving project list
	mysqli_select_db($link,"project_list");
	$deleteproject="delete from projects where project_id='".$_POST['projectid']."'";
	$result = mysqli_query($link,$deleteproject);
	if ($result)
	{
		echo "<script>alert('Successfully deleted project.');</script>";
		//echo "<script>setTimeout(\"location.href = 'http://localhost/infs3202-lackbackers/projects/myprojects.php';\",200);</script>";
		echo "<script>setTimeout(\"location.href = 'https://infs3202-3a14e833.uqcloud.net/lackbackers/projects/myprojects.php';\",200);</script>";
	}
	else
	{
		echo "<script>alert('Error in deleting');</script>"; 
	}
}
?>