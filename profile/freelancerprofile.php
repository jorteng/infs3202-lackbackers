<?php
//Connect to db
require_once '../database/db_connect.php';
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
            <p><?php echo htmlspecialchars($_SESSION['fullName'])?> </p>
            <p><?php echo htmlspecialchars($_SESSION['position'])?></p>
            <p><?php echo htmlspecialchars($_SESSION['description'])?></p>
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
                    <form method="post" id="insert_form">
                         <label>Enter First Name</label>
                         <input type="text" name="firstname" id="firstname" value="<?php echo htmlspecialchars($_SESSION['name'])?>" class="form-control" />
                         <br />
                         <label>Enter Last Name</label>
                         <input type="text" name="lastname" id="lastname" value="<?php echo htmlspecialchars($_SESSION['lastName'])?>" class="form-control" />
                         <br />
                         <label>Enter Position</label>
                         <input type="text" name="position" id="position" value ="<?php echo htmlspecialchars($_SESSION['position'])?>" class="form-control" />
                         <br />
                         <label>Enter Description</label>
                         <input type="text" name="description" id="description" value ="<?php echo htmlspecialchars($_SESSION['description'])?>" class="form-control" />
                         <br />
                         <input type="hidden" name="own_id" id="own_id" value ="<?php echo htmlspecialchars($_SESSION['own_id'])?>" />
                         <input type="hidden" name="userType" id="userType" value ="<?php echo htmlspecialchars($_SESSION['userType'])?>" />
                         <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />
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

     $('#insert_form').on("submit", function(event){
          event.preventDefault();
          if($('#firstname').val() == "")
          {
               alert("First Name is required");
          }
          else if($('#lastname').val() == '')
          {
               alert("Last Name is required");
          }
          else if($('#position').val() == '')
          {
               alert("Position is required");
          }
          else if($('#location').val() == '')
          {
               alert("Location is required");
          }
          else
          {
               $.ajax({
                    url:"insert.php",
                    method:"POST",
                    data:$('#insert_form').serialize(),
                    beforeSend:function(){
                         $('#insert').val("Inserting");
                    },
                    success:function(data){
                         $('#insert_form')[0].reset();
                         $('#myModal').modal('hide');
                         $('#details').html(data);
                    }
               });
          }
     });
});
</script>
</body>
