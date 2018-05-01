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
		//get owner's details
		if($user_type == 1)
		{
			$stmt = $link->prepare("SELECT * FROM project_owners WHERE userID= $user_id ");
			$stmt->execute();
			$stmt->store_result();
			$stmt->execute();
            $result = $stmt->get_result();
            $owner = $result->fetch_assoc();
			$name = $owner['companyName'];
			$own_id = $owner['owner_id']; 
		}
		else if($user_type == 2)
		{
			$stmt = $link->prepare("SELECT * FROM freelancers WHERE userID= $user_id ");
			$stmt->execute();
			$stmt->store_result();
			$stmt->execute();
            $result = $stmt->get_result();
            $freelancer = $result->fetch_assoc();
			$name = $freelancer['firstName'];
			$own_id = $freelancer['freelance_id'];
		}
		$_SESSION['email'] = $email;
		$_SESSION['userType'] = $user_type;
		$_SESSION['own_id'] = $own_id;
		$_SESSION['name'] = $name;
        header('location: /lackbackers');
    }
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
