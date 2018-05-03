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
    <div class="fb-profile">
        <img align="left" class="fb-image-lg" src="<?php echo $GLOBALS['URL']?>images/slide3.png" alt="Profile image example" width=100% height=50%>
        <img align="left" class="fb-image-profile thumbnail" style="margin-top: -60px; margin-left:100px" src="<?php echo $GLOBALS['URL']?>images/pp.jpg" alt="Profile image example"/>
        <div class="fb-profile-text">
            <h1><?php if ($_SESSION['userType'] == 1) {echo htmlspecialchars($_SESSION['name']);} else { echo htmlspecialchars($_SESSION['fullName']);}?> </h1>
            <h2><?php if ($_SESSION['userType'] == 1) {echo htmlspecialchars($_SESSION['address']);} else { echo htmlspecialchars($_SESSION['position']);}?></h2>
            <h2><?php if ($_SESSION['userType'] == 1) {echo htmlspecialchars($_SESSION['city']);} else { echo htmlspecialchars($_SESSION['description']);}?></h2>
            <h2><?php if ($_SESSION['userType'] == 1) {echo htmlspecialchars($_SESSION['country']);} else { echo '';}?></h2>
            <a>(Username,location,contact info,summary)</a>
        </div>
    </div>
  </div>
</div>
<!-- /container fluid-->
<div class="container">
  <div class="col-sm-8">
      <div data-spy="scroll" class="tabbable-panel">
        <div class="tabbable-line">
          <ul class="nav nav-tabs ">
            <li class="active">
              <a href="#tab_default_1" data-toggle="tab">
              Recent Reviews </a>
            </li>
            <li>
              <a href="#tab_default_2" data-toggle="tab">
             Qualification</a>
            </li>
            <li>
              <a href="#tab_default_3" data-toggle="tab">
             Education</a>
            </li>
             <li>
              <a href="#tab_default_4" data-toggle="tab">
            Experience</a>
            </li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="tab_default_1">
              <h4>Helping out with fixing the HTML</h4>
              <p>"He is a very on-time and realiable and awesome works he has produced."</p>
              <h4>HTML side not working properly</h4>
              <p>"He fixed it very fast! He has good code debugger skills."</p>
              <h4>Building my website </h4>
              <p>“I am extremely satisfied with his work. He created my website for my new consulting agency in the United States.
                He stayed in touch throughout the process and listened to my requests and worked on them very carefully. Delivered on time. Recommended!”</p>
            </div>
            <div class="tab-pane" id="tab_default_2">
              <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                     <label for="email">Professional Certificate or Award</label>
                      <p>lalala</p>
                 </div>
                  <div class="form-group">
                     <label for="email">Organisation</label>
                      <p>lalala</p>
                 </div>
                  <div class="form-group">
                     <label for="email">Description</label>
                      <p>lalala</p>
                 </div>
                  <div class="form-group">
                     <label for="email">Year</label>
                      <p>lalala</p>
                 </div>
              </div>
              </div>
            </div>
            <div class="tab-pane" id="tab_default_3">
              <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                     <label for="email">Country</label>
                      <p> MBA/PGDM</p>
                 </div>
                  <div class="form-group">
                     <label for="email">Degree</label>
                      <p> pune, maharashtra</p>
                 </div>
                  <div class="form-group">
                     <label for="email">Start Year</label>
                      <p> pune, maharashtra</p>
                 </div>
                  <div class="form-group">
                     <label for="email">End Year</label>
                      <p> pune, maharashtra</p>
                 </div>
              </div>
              <div class="col-sm-6">
                 <div class="form-group">
                     <label for="email">Place of Birth:</label>
                      <p> pune, maharashtra</p>
                 </div>
                  <div class="form-group">
                     <label for="email">Place of Birth:</label>
                      <p> pune, maharashtra</p>
                 </div>
                  <div class="form-group">
                     <label for="email">Place of Birth:</label>
                      <p> pune, maharashtra</p>
                 </div>
                  <div class="form-group">
                     <label for="email">Place of Birth:</label>
                      <p> pune, maharashtra</p>
                 </div>

               </div>
              </div>
            </div>
             <div class="tab-pane" id="tab_default_4">
              <p>
               Lifestyle

              </p>
               <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                     <label for="email">Highest Education:</label>
                      <p> MBA/PGDM</p>
                 </div>
                  <div class="form-group">
                     <label for="email">Place of Birth:</label>
                      <p> pune, maharashtra</p>
                 </div>
                  <div class="form-group">
                     <label for="email">Place of Birth:</label>
                      <p> pune, maharashtra</p>
                 </div>
                  <div class="form-group">
                     <label for="email">Place of Birth:</label>
                      <p> pune, maharashtra</p>
                 </div>
              </div>
              <div class="col-sm-6">
                 <div class="form-group">
                     <label for="email">Place of Birth:</label>
                      <p> pune, maharashtra</p>
                 </div>
                  <div class="form-group">
                     <label for="email">Place of Birth:</label>
                      <p> pune, maharashtra</p>
                 </div>
                  <div class="form-group">
                     <label for="email">Place of Birth:</label>
                      <p> pune, maharashtra</p>
                 </div>
                  <div class="form-group">
                     <label for="email">Place of Birth:</label>
                      <p> pune, maharashtra</p>
                 </div>

               </div>
              </div>
            </div>
          </div>
        </div>
      </div>

  </div>
  <div class="col-sm-4">
   <div class="panel panel-default">
    <div class="menu_title">
       Qualification Reports
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-12">
                 <div class="form-group">
                     <label for="email">Rate per hours:</label>
                      <p>$40/hour</p>
                 </div>
                  <div class="form-group">
                      <label for="email">% jobs completed:</label>
                      <p>45</p>
                  </div>
                  <div class="form-group">
                      <label for="email">% on budget:</label>
                      <p>50</p>
                  </div>
                   <div class="form-group">
                      <label for="email">% on time:</label>
                      <p>40</p>
                   </div>
                    <div class="form-group">
                      <label for="email">% repeat hire:</label>
                      <p>60</p>
                    </div>
            </div>
        </div>
    </div>
</div>
  </div>
</div>
</body>
