<?php
 require_once '../database/db_connect.php';
 session_start();
 if(!empty($_POST))
 {
      $id='';
      $output_body = '';
      $message = '';

      if($_POST["own_id"] != '')
      {
          if($_POST["userType"] == 2)
          {

          $usertype = mysqli_real_escape_string($link, $_POST["userType"]);
          $firstname = mysqli_real_escape_string($link, $_POST["firstname"]);
          $lastname = mysqli_real_escape_string($link, $_POST["lastname"]);
          $position = mysqli_real_escape_string($link, $_POST["position"]);
          $description = mysqli_real_escape_string($link, $_POST["description"]);
          $query = "
          UPDATE freelancers
          SET firstName='$firstname',
          lastName='$lastname',
          position='$position',
          description = '$description'
          WHERE freelance_id='".$_POST["own_id"]."'";

          }

          else {

          $companyName = mysqli_real_escape_string($link, $_POST["companyName"]);
          $address = mysqli_real_escape_string($link, $_POST["address"]);
          $city = mysqli_real_escape_string($link, $_POST["city"]);
          $country = mysqli_real_escape_string($link, $_POST["country"]);
          $query = "
          UPDATE project_owners
          SET companyName='$companyName',
          address='$address',
          city='$city',
          country = '$country'
          WHERE owner_id='".$_POST["own_id"]."'";
          }

      }
      if(mysqli_query($link, $query))
      {
           if($_POST["userType"] == 2){

           $free_query = "SELECT freelance_id,firstName,lastName,position,description,userID, CONCAT(firstName,' ',lastName) as fullName FROM freelancers where freelance_id= '".$_POST["own_id"]."'";
           $result = mysqli_query($link, $free_query);
           $row = mysqli_fetch_array($result);
           $name = $row["firstName"];
           $last_name = $row['lastName'];
           $position = $row['position'];
           $description = $row['description'];
           $full_name = $row['fullName'];
           $_SESSION['name'] = $name;
           $_SESSION['position'] = $position;
           $_SESSION['description'] = $description;
           $_SESSION['fullName'] = $full_name;
           $output_body .= '
           <div id="details" class="fb-profile-text">
               <p>'.$_SESSION['fullName'].'</p>
               <p>'.$_SESSION['position'].'</p>
               <p>'.$_SESSION['description'].'</p>
           </div>
           ';
         }

         else {

           $owner_query = "SELECT * FROM project_owners where owner_id= '".$_POST["own_id"]."'";
           $result = mysqli_query($link, $owner_query);
           $row = mysqli_fetch_array($result);
           $companyName = $row["companyName"];
           $address = $row['address'];
           $city = $row['city'];
           $country = $row['country'];

           $_SESSION['name'] = $companyName;
           $_SESSION['address'] = $address;
           $_SESSION['city'] = $city;
           $_SESSION['country'] = $country;

           $output_body .= '
           <div id="details" class="fb-profile-text">
               <p>'.$_SESSION['name'].'</p>
               <p>'.$_SESSION['address'].'</p>
               <p>'.$_SESSION['city'].'</p>
               <p>'.$_SESSION['country'].'</p>
           </div>
           ';
         }

          echo $output_body;
          echo "<meta http-equiv='refresh' content='0'>";
      }

 }
 ?>
