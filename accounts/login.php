<!-- Login Page File -->
<?php
//Connect to db
require_once '../database/db_connect.php';
include '../includes/header.php';

//Define variables and initialize with empty values
$email = $password = "";
$email_err = $password_err = "";

//Process form data
if($_SERVER["REQUEST_METHOD"] == "POST"){
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
    if(empty($email_err) && empty($password_err)){
        //Prepare a select statement
        $sql = "SELECT email, password FROM users WHERE email = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            //Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            //Set parameters
            $param_email = $email;
            //Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                //Store result
                mysqli_stmt_store_result($stmt);
                //Check if email exists, if yes, verify password
                if(mysqli_stmt_num_rows($stmt) == 1){
                    //Bind result variables
                    mysqli_stmt_bind_result($stmt, $email, $hashed_password);

                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            /* If password is correct, start a new session and save email to the session */
                            session_start();
                            $_SESSION['email'] = $email;
                            header("location: /lackbackers");
                        } else{
                            //Display password invalid error message
                            $password_err = 'Login attempt fail.';
                        }
                    }
                } else{
                    //Display email doesn't exist error message
                    $email_err = 'Login attempt fail.';
                }
            } else{
                echo "Something went wrong. Please try again later.";
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
