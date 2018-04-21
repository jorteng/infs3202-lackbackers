<?php
// Initialize the session
session_start();
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['email']) || empty($_SESSION['email'])){
  header("location: /lackbackers");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<body>


    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION['email']); ?></b>. Welcome to our site.</h1>
    </div>
    <p><a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a></p>


</body>
</html>

<?php
require '../includes/footer.php';
?>
