<!-- Login Page File -->
<?php
//Connect to db
require_once '../database/db_connect.php';
include 'includes/header.php';

//Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
  //Check if username field is empty
  if(empty(trim($_POST["username"]))){
    $username_err = 'Please enter your username.';
  } else{
    $username = trim($_POST["username"]);
  }
  //Check if password field is empty
    if(empty(trim($_POST['password']))){
        $password_err = 'Please enter your password.';
    } else{
        $password = trim($_POST['password']);
    }

    //Validate credentials
    if(empty($username_err) && empty($password_err)){
        //Prepare a select statement
        $sql = "SELECT username, password FROM accounts_basic WHERE username = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            //Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            //Set parameters
            $param_username = $username;
            //Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                //Store result
                mysqli_stmt_store_result($stmt);
                //Check if username exists, if yes, verify password
                if(mysqli_stmt_num_rows($stmt) == 1){
                    //Bind result variables
                    mysqli_stmt_bind_result($stmt, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            /*If password is correct, start a new session and
                            save username to the session */
                            session_start();
                            $_SESSION['username'] = $username;
                            header("location: welcome.php");
                        } else{
                            //Display password invalid error message
                            $password_err = 'Incorrect Password.';
                        }
                    }
                } else{
                    //Display username doesn't exist error message
                    $username_err = 'No account found with username entered.';
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
<head>
    <title>Login</title>
    <link rel="icon" href="../images/favicon.png" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
    /* Remove the navbar's default margin-bottom and rounded borders */
    .navbar {
        margin-bottom: 0;
        border-radius: 0;
    }
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}

    body{ font: 14px sans-serif; background: #D3D3D3 !important;}
        .wrapper{ width: 350px; padding: 20px; }
    /* Set black background color, white text and some padding */
    footer {
        background-color: #555;
        color: white;
        padding: 15px;
        }
    }
    </style>
</head>
<body>


        <div class="col-sm-4"></div>
        <div class="col-sm-3">
        <h2>Frequently Asked Questions</h2>

        </div>


</body>
</html>
