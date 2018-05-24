<?php
//Connect to db
require_once '../database/db_connect.php';

session_start();

if(!isset($_SESSION['own_id'])){
    header("location: https://infs3202-3a14e833.uqcloud.net/lackbackers/accounts/login.php");
}
else if ($_SESSION['userType']==2){
	header("location: https://infs3202-3a14e833.uqcloud.net/lackbackers/");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php require '../includes/resources.php';?>
</head>
<script>
</script>
<body>
    <?php require '../includes/header.php';?>
  <div class="container-fluid">
  <div class="row">
    <div id="general" class="fb-profile">
        <img align="left" class="fb-image-lg" src="<?php echo $GLOBALS['URL']?>images/slide3.png" alt="Profile image example" width=100% height=50%>
        <img align="left" class="fb-image-profile thumbnail" style="margin-top: -60px; margin-left:100px" src="<?php echo $GLOBALS['URL']?>images/pp.jpg" alt="Profile image example"/>
        <div id="details" class="fb-profile-text">
            <p><?php echo htmlspecialchars($_SESSION['name'])?> </p>
            <p><?php echo htmlspecialchars($_SESSION['address'])?></p>
            <p><?php echo htmlspecialchars($_SESSION['city'])?></p>
            <p><?php echo htmlspecialchars($_SESSION['country'])?></p>
        </div>
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Edit Profile</button>
    </div>
  </div>
</div>

<!-- Update Profile Modal -->
<div id="myModal" class="modal fade" role="dialog">
     <div class="modal-dialog">
          <div class="modal-content">
               <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Profile</h4>
               </div>
               <div class="modal-body">
                    <form method="post" id="update_form">
                         <label>Enter Company Name</label>
                         <input type="text" name="companyName" id="companyName" value="<?php echo htmlspecialchars($_SESSION['name'])?>" class="form-control" />
                         <br />
                         <label>Enter Address</label>
                         <input type="text" name="address" id="address" value="<?php echo htmlspecialchars($_SESSION['address'])?>" class="form-control" />
                         <br />
                         <label>Enter Country</label>
                         <input type="text" name="country" id="country" value ="<?php echo htmlspecialchars($_SESSION['country'])?>" class="form-control" />
                         <br />
                         <label>Enter City</label>
                         <input type="text" name="city" id="city" value ="<?php echo htmlspecialchars($_SESSION['city'])?>" class="form-control" />
                         <br />
                         <input type="hidden" name="own_id" id="own_id" value ="<?php echo htmlspecialchars($_SESSION['own_id'])?>" />
                         <input type="hidden" name="userType" id="userType" value ="<?php echo htmlspecialchars($_SESSION['userType'])?>" />
                         <input type="submit" name="update" id="update" value="update" class="btn btn-success" />
                    </form>
               </div>
               <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               </div>
          </div>
     </div>
</div>
<script>
$(document).ready(function(){

     $('#update_form').on("submit", function(event){
          event.preventDefault();
          if($('#companyName').val() == "")
          {
               alert("Company Name is required");
          }
          else if($('#address').val() == '')
          {
               alert("Address is required");
          }
          else if($('#country').val() == '')
          {
               alert("Country is required");
          }
          else if($('#city').val() == '')
          {
               alert("City is required");
          }
          else
          {
               $.ajax({
                    url:"update.php",
                    method:"POST",
                    data:$('#update_form').serialize(),
                    beforeSend:function(){
                         $('#update').val("updating");
                    },
                    success:function(data){
                         $('#update_form')[0].reset();
                         $('#myModal').modal('hide');
                         $('#details').html(data);
                    }
               });
          }
     });
});
</script>
</body>
