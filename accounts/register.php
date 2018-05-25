<?php
//Connect to db
require_once '../database/db_connect.php';

session_start();
if(isset($_SESSION['own_id'])){
    header("location: https://infs3202-3a14e833.uqcloud.net/lackbackers/");
}

//Define variables and initialize with empty values
$email = $password = $confirm_password = "";
$email_err = $password_err = $confirm_password_err = "";
$userType = "";
$userType_err = "";
$firstName = $lastName = $position = $description = "";
$firstName_err = $lastName_err = $position_err = $description_err = "";
$companyName = $address = $city = $country = "";
$companyName_err = $address_err = $city_err = $country_err = "";

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

    //Validate userType
	//echo '<script language=\'javascript\'>document.getElementById("userType").innerHTML=loadRemainingForm($_POST[\'userType\'])</script>';
    if(empty($_POST['userType'])){
        $userType_err = "Please select an Account Type.";
    } else{
        $userType = $_POST['userType'];
		//owner
		if($userType == '1')
		{
			//Validate companyName
			if(empty(trim($_POST['companyName']))){
				$companyName_err = "Company name is required.";
			} else{
			  $companyName = trim($_POST['companyName']);
			  if (!preg_match("/^[a-zA-Z ]*$/",$companyName)){
				$companyName_err = "Only letters and white space allowed";
			  }
			}
			//Validate address
			if(empty(trim($_POST['address']))){
				$address_err = "Address is required.";
			} else{
				$address = trim($_POST['address']);
				if (!preg_match("/^[a-zA-Z ]*$/",$address)){
				  $address_err = "Only letters and white space allowed";
				}
			}
			//Validate city
			if(empty(trim($_POST['city']))){
				$city_err = "City is required.";
			} else{
				$city = trim($_POST['city']);
				if (!preg_match("/^[a-zA-Z ]*$/",$city)){
				  $city_err = "Only letters and white space allowed";
				}
			}
			//Validate country
			if(empty(trim($_POST['country']))){
				$country_err = "Country is required.";
			} else{
				$country = trim($_POST['country']);
				if (!preg_match("/^[a-zA-Z ]*$/",$country)){
				  $country_err = "Only letters and white space allowed";
				}
			}
		}
		//freelancer
		else if($userType == '2')
		{
			//Validate firstname
			if(empty(trim($_POST['firstName']))){
				$firstName_err = "First name is required.";
			} else{
			  $firstName = trim($_POST['firstName']);
			  if (!preg_match("/^[a-zA-Z ]*$/",$firstName)){
				$firstName_err = "Only letters and white space allowed";
			  }
			}
			//Validate lastname
			if(empty(trim($_POST['lastName']))){
				$lastName_err = "Last name is required.";
			} else{
				$lastName = trim($_POST['lastName']);
				if (!preg_match("/^[a-zA-Z ]*$/",$lastName)){
				  $lastName_err = "Only letters and white space allowed";
				}
			}
			//Validate position
			if(empty(trim($_POST['position']))){
				$position_err = "Position is required.";
			} else{
				$position = trim($_POST['position']);
				if (!preg_match("/^[a-zA-Z ]*$/",$position)){
				  $position_err = "Only letters and white space allowed";
				}
			}
			//Validate description
			if(empty(trim($_POST['description']))){
				$description_err = "Description is required.";
			} else{
				$description = trim($_POST['description']);
				if (!preg_match("/^[a-zA-Z ]*$/",$description)){
				  $description_err = "Only letters and white space allowed";
				}
			}
		}
    }



    //Check input errors before inserting in database
    if(empty($email_err) && empty($password_err) && empty($userType_err)){
		//owner
		if($userType == '1')
		{
			if(empty($companyName_err) && empty($address_err) && empty($city_err) && empty($country_err)){
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
					mysqli_stmt_execute($stmt);

					$sql= "INSERT INTO project_owners(companyName, address, city, country,longitude,latitude,photoPath, userID) values (?,?,?,?,0.0,0.0,'-',(select userID from users where email = ?))";
					if($stmt = mysqli_prepare($link, $sql)){
						mysqli_stmt_bind_param($stmt, "sssss", $param_companyName, $param_address, $param_city, $param_country, $param_email);
						$param_companyName = $companyName;
						$param_address = $address;
						$param_city = $city;
						$param_country = $country;
						$param_email = $email;
					//Attempt to execute the prepared statement
					if(mysqli_stmt_execute($stmt)){
						//Redirect to login page
						header("location: login.php");
					} else{
						echo "Something went wrong with the registration. Please try again later.";
					}
					}
				}
				//Close statement
				mysqli_stmt_close($stmt);
			}
		}
		else if($userType == '2')
		{
			if(empty($firstName_err) && empty($lastName_err) && empty($position_err) && empty($description_err)){
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
					mysqli_stmt_execute($stmt);

					$sql= "INSERT INTO freelancers(firstName, lastName, position, description, userID) values (?,?,?,?,(select userID from users where email = ?))";
					if($stmt = mysqli_prepare($link, $sql)){
						mysqli_stmt_bind_param($stmt, "sssss", $param_firstName, $param_lastName, $param_position, $param_description, $param_email);
						$param_firstName = $firstName;
						$param_lastName = $lastName;
						$param_position = $position;
						$param_description = $description;
						$param_email = $email;
					//Attempt to execute the prepared statement
					if(mysqli_stmt_execute($stmt)){
						//Redirect to login page
						header("location: login.php");
					} else{
						echo "Something went wrong with the registration. Please try again later.";
					}
					}
				}
				//Close statement
				mysqli_stmt_close($stmt);
			}
		}

    }
    //Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php require '../includes/resources.php';?>
<script>
function loadRemainingForm(value) {
  if (value=="") {
    document.getElementById("diffUserForms").innerHTML="";
    return;
  }
  else if(value=="1"){
	document.getElementById("owner").style.display = "inline";
	document.getElementById("freelancer").style.display = "none";
  }
  else{
	document.getElementById("freelancer").style.display = "inline";
	document.getElementById("owner").style.display = "none";
  }
}

</script>
</head>
<body>
  <?php require '../includes/header.php';?>
        <div class="second">
          <div class="col-sm-4"></div>
        <div id="registeration" class="col-sm-3">
        <h2>Registration</h2>
        <p>Please fill the following information to register with us.</p>
        <form id="registrationForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" onsubmit="refresh()">
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
              <select id="userType" name="userType" onchange="loadRemainingForm(this.value)">
                <option value="" selected="selected">--Select Account Type--</option>
                <option value="1" <?php if($userType==1){echo 'selected="selected"';}  ?>>Project Owners</option>
                <option value="2" <?php if($userType==2){echo 'selected="selected"';}  ?>>Freelancer</option>
            </select>
                <span class="help-block"><?php echo $userType_err; ?></span>
            </div>
			<div id="diffUserForms">
				<div class="form-group" id="freelancer" <?php if($userType==2){echo 'style="display:inline" ';}else{echo 'style="display:none" ';}?>>
					<div class="form-group <?php echo(!empty($firstName_err)) ? 'has-error' : '' ?> ">
						<label>First Name</label>
						<input type="text" name="firstName" class="form-control" value="<?php echo $firstName ?>">
						<span class="help-block"><?php echo $firstName_err; ?></span>
					</div>
					<div class="form-group <?php echo(!empty($lastName_err)) ? 'has-error' : '' ?>">
						<label>Last Name</label>
						<input type="text" name="lastName" class="form-control" value="<?php echo $lastName ?>">
						<span class="help-block"><?php echo $lastName_err; ?></span>
					</div>
					<div class="form-group <?php echo(!empty($position_err)) ? 'has-error' : '' ?>">
						<label>Position</label>
						<input type="text" name="position" class="form-control" value="<?php echo $position ?>">
						<span class="help-block"><?php echo $position_err; ?></span>
					</div>
					<div class="form-group <?php echo(!empty($description_err)) ? 'has-error' : '' ?>">
						<label>Description</label>
						<textarea name="description" form="registrationForm" rows="4" cols="50" method="POST" placeholder="Enter description here..."><?php echo $description ?></textarea>
						<span class="help-block"><?php echo $description_err; ?></span>
					</div>
				</div>
				<div class="form-group" id="owner" <?php if($userType==1){echo 'style="display:inline" ';}else{echo 'style="display:none" ';}?>>
					<div class="form-group <?php echo(!empty($companyName_err)) ? 'has-error' : '' ?>">
						<label>Company Name</label>
						<input type="text" name="companyName" class="form-control" value="<?php echo $companyName ?>">
						<span class="help-block"><?php echo $companyName_err; ?></span>
					</div>
					<div class="form-group <?php echo(!empty($address_err)) ? 'has-error' : '' ?>">
						<label>Address</label>
						<input type="text" name="address" class="form-control" value="<?php echo $address ?>">
						<span class="help-block"><?php echo $address_err; ?></span>
					</div>
					<div class="form-group <?php echo(!empty($city_err)) ? 'has-error' : '' ?>">
						<label>City</label>
						<input type="text" name="city" class="form-control" value="<?php echo $city ?>">
						<span class="help-block"><?php echo $city_err; ?></span>
					</div>
					<div class="form-group <?php echo(!empty($country_err)) ? 'has-error' : '' ?>">
						<label>Country</label>
						<input type="text" name="country" class="form-control" value="<?php echo $country ?>">
						<span class="help-block"><?php echo $country_err; ?></span>
					</div>
				</div>
			</div>
            <div class="form-group">
                <input id="submitRegister" type="submit" class="btn btn-primary" value="Submit">
                <input id="resetRegister" type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php"></br>Login here</a>.</p>
        </form>
    </div>
  </div>
</body>
<?php
require '../includes/footer.php';
?>
</html>
