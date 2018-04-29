<?php
   require_once 'credentials.php';
    //Create connection
    $link = mysqli_connect($servername, $username, $password, $db_name);

    //Dropdown list for Registration
    $queryAccType = "SELECT * FROM `accounts_type`";
    $resultAccTypeList = mysqli_query($link, $queryAccType);

    //Dropdown list for Project Selection
    $queryProject = "SELECT * FROM `projects`";
    $resultProjectList = mysqli_query($link, $queryProject);

    //Ajax for retrieving project list
    mysqli_select_db($link,"project_list");
    $ajaxProjectlist="select projects.project_title,projects.project_desc,project_owners.companyName from projects,project_owners WHERE project_id = '".$q."' AND project_owners.owner_id=projects.owner_id";
    $ajaxProjectlistresult = mysqli_query($link,$ajaxProjectlist);
	

    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to database: " . mysqli_connect_error();
    }
    ?>
