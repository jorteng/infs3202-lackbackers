<!-- Nagivation Bar File -->
<?php
//Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
  <div id="slideBar" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <h2>Login</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
        <label>Username</label>
        <input type="text" name="username"class="form-control" value="<?php echo $username; ?>">
        <span class="help-block"><?php echo $username_err; ?></span>
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
  <div id="main">
    <!-- <span class="glyphicon glyphicon-log-in"></span>&#9776; Login</a> -->
    <span style="cursor:pointer" onclick="openNav()" class="glyphicon glyphicon-log-in">Login</span>
  </div>
</body>
</html>
