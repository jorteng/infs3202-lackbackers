<?php
//Connect to db
require_once '../database/db_connect.php';

//Define variables and initialize with empty values
$email = $password = $confirm_password =  "";
$email_err = $password_err = $confirm_password_err = "";
$userType_err = "";


//Dropdown list for Registration
$queryAccType = "SELECT * FROM `accounts_type`";
$resultAccTypeList = mysqli_query($link, $queryAccType);

//Process form data
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //Validate email
    if(empty(trim($_POST["email"]))){
        $email_err = "Email is required.";
    } else{
        //Prepare a select statement
        $sql = "SELECT userID FROM users WHERE email = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            //Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);

            //Set parameters
            $param_email = trim($_POST["email"]);

            //Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                //Store results
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = "This email is already taken.";
                } else{
                    $email = trim($_POST["email"]);
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                      $email_err = "Invalid email format";
            }
                }
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }

        //Close statement
        mysqli_stmt_close($stmt);
    }

    //Validate password
    if(empty(trim($_POST['password']))){
      $password_err = "Password is required.";
    } elseif(strlen(trim($_POST['password'])) < 6){
      $password_err = "Password must have at least 6 characters.";
    } else{
        $password = trim($_POST['password']);
    }
    //Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = 'Please confirm password.';
    } else{
        $confirm_password = trim($_POST['confirm_password']);
        if($password != $confirm_password){
            $confirm_password_err = 'Password did not match.';
        }
    }
    /*
    //Validate firstname
    if(empty(trim($_POST['firstname']))){
        $firstname_err = "First name is required.";
    } else{
      $firstname = trim($_POST['firstname']);
      if (!preg_match("/^[a-zA-Z ]*$/",$firstname)){
        $firstname_err = "Only letters and white space allowed";
      }
    }
    //Validate lastname
    if(empty(trim($_POST['lastname']))){
        $lastname_err = "Last name is required.";
    } else{
        $lastname = trim($_POST['lastname']);
        if (!preg_match("/^[a-zA-Z ]*$/",$lastname)){
          $lastname_err = "Only letters and white space allowed";
        }
    }
*/
    //Validate userType

    if(empty(trim($_POST['userType']))){
        $userType_err = "Please select an Account Type.";
    } else{
        $userType = trim($_POST['userType']);
    }


    //Check input errors before inserting in database
    if(empty($email_err) && empty($password_err) && empty($userType_err)){
        //Insert statement
        $sql = "INSERT INTO users (email, password, userTypeID) VALUES (?, ?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            //Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssi", $param_email, $param_password, $param_userType);

            $option = [
              'cost' => 10,
              'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
            ];

            //Set parameters
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_BCRYPT, $option);
			$param_userType = $userType;

            //Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                //Redirect to login page
                header("location: login.php");
            } else{
                echo "Something went wrong with the registration. Please try again later.";
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
<head>
<?php require '../includes/resources.php';?>
</head>
<body>
  <?php require '../includes/header.php';?>
        <div class="second">
        <div id="" class="col-sm-4"></div>
        <div id="registeration" class="col-sm-3">
        <h2>Registration</h2>
        <p>Please fill the following information to register with us.</p>
        <form id="registrationForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                <span class="help-block"><?php echo $email_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>

            <div class="form-group <?php echo (!empty($userType_err)) ? 'has-error' : ''; ?>">
              <select id="userType" name="userType">
            <option value="">--Select Account Type--</option>
            <option value="1">Project Owners</option>
            <option value="2">Freelancer</option>
            </select>
                <span class="help-block"><?php echo $userType_err; ?></span>
            </div>

            <div class="form-group">
                <input id="submitRegister" type="submit" class="btn btn-primary" value="Submit">
                <input id="resetRegister" type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>
  </div>


</body>
</html>
