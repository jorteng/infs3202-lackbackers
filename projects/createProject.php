<?php
//Connect to db
require_once '../database/db_connect.php';
require '../includes/header.php';

//Define variables and initialize with empty values
$title = $description = $file_url = "";
$title_err = $description_err = $file_err = "";

//Process form data
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //Validate email
    if(empty(trim($_POST["project_title"]))){
        $title_err = "Title is required.";
    } 
	else if (empty(trim($_POST["project_desc"])))
	{
		$description_err = "Please provide some description";
	}
	
	//for file uploading
	if((  ($_FILES['file']['type'] == "image/jpeg")
		||($_FILES['file']['type'] == "image/pjpeg")
		||($_FILES['file']['type'] == "image/jpg")
		||($_FILES['file']['type'] == "image/png"))
		&& ($_FILES['file']['size'] <50000))
		{
			if($_FILES['file']['error'] > 0)
			{
				$file_err = "Return Code:".$_FILES['file']['error'];
			}
			else
			{
				$file_url = '../images/projects/'.basename($_SESSION['own_id']."-".$_POST["project_title"]."-".$_FILES["file"]["name"]);
				if (move_uploaded_file($_FILES["file"]["tmp_name"], $file_url)) {
				} else {
					$file_err = "There was an error uploading your file.";
				}
			}
		}

    //Check input errors before inserting in database
    if(empty($title_err) && empty($description_err) && empty($file_err)){
        //Insert statement
        $sql = "INSERT INTO projects (project_title, project_desc, project_status, photoPath, owner_id) VALUES (?, ?, 'active', ?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            //Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssi", $param_title, $param_description, $param_file_url, $param_ownerID);

            //Set parameters
            $param_title = $_POST["project_title"];
            $param_description = $_POST["project_desc"];
			$param_file_url = $file_url;
			$param_ownerID = $_SESSION['own_id'];

            //Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                //Redirect to homepage
                header("location: /lackbackers");
            } else{
                echo "Something went wrong with the project creation. Please try again later.";
            }
        }
        //Close statement
        mysqli_stmt_close($stmt);
    }
    //Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">
<body>
        <div class="second">
        <div id="" class="col-sm-4"></div>
        <div id="newProject" class="col-sm-3">
        <h2>Create New Project</h2>
        <form id="newProjectForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                <label>Project Title</label>
                <input type="text" name="project_title" class="form-control" value="<?php echo $title; ?>">
                <span class="help-block"><?php echo $title_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($description_err)) ? 'has-error' : ''; ?>">
                <label>Description</label>
				<textarea name="project_desc" form="newProjectForm" rows="4" cols="50" method="POST" placeholder="Enter description here..." value="<?php echo $description; ?>"></textarea>
                <span class="help-block"><?php echo $description_err; ?></span>
            </div>
			<div class="form-group <?php echo (!empty($file_err)) ? 'has-error' : ''; ?>">
                <label>Select image to upload:</label>
				<input type="file" name="file" id="file">
                <span class="help-block"><?php echo $file_err; ?></span>
            </div>

            <div class="form-group">
                <input id="submitProject" type="submit" class="btn btn-primary" value="Submit">
                <input id="resetProject" type="reset" class="btn btn-default" value="Reset">
            </div>
        </form>
    </div>
  </div>


</body>
</html>
