<!-- Login Page File -->
<?php
//Connect to db
require_once '../database/db_connect.php';
include '../includes/header.php';

//Define variables and initialize with empty values
$email = $password = $user_id = $user_type = "";
$email_err = $password_err = $userID_err = $userType_err = "";

//Process form data
if ($_POST) {
    // form validation
    if (empty($_POST['email']) || empty($_POST['password'])) {
        $errors[] = 'You must provide email and password.';
    } else {
        // check if email exist in the databse
        $stmt = $link->prepare("SELECT * FROM users WHERE email=?");
        $stmt->bind_param('s', $_POST['email']);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows() < 1) {
            $errors[] = 'That username doesn\'t exist in our database.';
        } else {
            // Check if password matches
            $stmt->execute();
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();
            if (!password_verify($_POST['password'], $user['password'])) {
                $errors[] = 'The password does not match our records. Please try again.';
            }
        }
    }
    // check for errors
    if (!empty($errors)) {
        echo '<div class="alert alert-danger">' . $errors[0] . '</div>';
    } else {
        // log user in
		$email = $user['email'];
        $user_id = $user['userID'];
		$user_type = $user['userTypeID'];
		/*
		if($user_type == 1)
		{
			$sql2 = "SELECT companyName FROM project_owners WHERE userID='$user_id'";
		}
		else
		{
			$sql2 = "SELECT firstName FROM freelancers WHERE userID='$user_id'";
		}
		$stmt = $link->prepare($sql2);
		$stmt->execute();
		$stmt->store_result();
		$result = $stmt->get_result();
		$result2 = $result->fetch_assoc();
		if($user_type == 1)
		{
			$name = $result2['companyName'];
		}
		else
		{
			$name = $result2['firstName'];
		}
		$_SESSION['name'] = $name;*/
		$_SESSION['email'] = $email;
		$_SESSION['userID'] = $user_id;
		$_SESSION['userType'] = $user_type;
        header('location: /lackbackers');
    }
}
/*
if($_SERVER["REQUEST_METHOD"] == "POST")
{	
	//Check if email field is empty
	if(empty(trim($_POST["email"]))){
	$email_err = 'Please enter your email.';
	} else{
	$email = trim($_POST["email"]);
	}
	
	//Check if password field is empty
    if(empty(trim($_POST['password']))){
        $password_err = 'Please enter your password.';
    } else{
        $password = trim($_POST['password']);
    }
	
    //Validate credentials
    if(empty($email_err) && empty($password_err))
	{
        //Prepare a select statement
        $sql = "SELECT email, password FROM users WHERE email = ?";

        if($stmt = mysqli_prepare($link, $sql))
		{
            //Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            //Set parameters
            $param_email = $email;
            //Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt))
			{
                //Store result
                mysqli_stmt_store_result($stmt);
                //Check if email exists, if yes, verify password
                if(mysqli_stmt_num_rows($stmt) == 1)
				{
                    //Bind result variables
                    mysqli_stmt_bind_result($stmt, $email, $hashed_password);

                    if(mysqli_stmt_fetch($stmt))
					{
                        if(password_verify($password, $hashed_password))
						{
                            /* If password is correct, start a new session and save email to the session */
                            //session_start();
                            /*$_SESSION['email'] = $email;
							$stmt = $link->prepare("SELECT userID, userTypeID FROM users WHERE email = $email");
							$stmt->execute();
							$stmt->store_result();
							$result = $stmt->get_result();
							$result2 = $result->fetch_assoc();
							$userID = $result2['userID'];
							$userType = $result2['userTypeID'];
							if($userType == 1)
							{
								$sql2 = "SELECT companyName FROM project_owners WHERE userID='$userID'";
							}
							else
							{
								$sql2 = "SELECT firstName FROM freelancers WHERE userID='$userID'";
							}
							$stmt = $conn->prepare($sql2);
							$stmt->execute();
							$stmt->store_result();
							$result = $stmt->get_result();
							$result2 = $result->fetch_assoc();
							if($userType == 1)
							{
								$name = $result2['companyName'];
							}
							else
							{
								$name = $result2['firstName'];
							}
							$_SESSION['name'] = $name;
							header("location: /infs3202-lackbackers");		
						}							
					}		
                            
                }
				else
				{
                    //Display password invalid error message
					$password_err = 'Login attempt fail.';        
                }
            }
            else
			{
				//Display email doesn't exist error message
				$email_err = 'Login attempt fail.';
            }
        } else{
		echo "Something went wrong. Please try again later.";}
        //Close statement
        mysqli_stmt_close($stmt);
    }
    //Close connection
    mysqli_close($link);
}*/
?>

<!DOCTYPE html>
<html lang="en">
<body>
        <div class="second">
        <div class="col-sm-4"></div>
        <div class="col-sm-3">
        <h2>Login</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                <label>Email</label>
                <input type="text" name="email"class="form-control" value="<?php echo $email; ?>">
                <span class="help-block"><?php echo $email_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="register.php">Register with Us!</a></p>
        </form>
        </div>
      </div>


</body>
</html>
