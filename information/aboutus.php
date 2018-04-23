<!-- Main Home File -->
<?php
// $GLOBALS['URL'] = "http://localhost/infs3202-lackbackers/";
$GLOBALS['URL'] = "https://infs3202-3a14e833.uqcloud.net/lackbackers/";
require_once '../database/db_connect.php';
require '../includes/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>

  <link rel="icon" href="images/favicon.png" type="image/png">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="content/text.css" type="text/css">

  <script>
  function openNav() {
    document.getElementById("slideBar").style.width = "300px";
    document.getElementById("main").style.marginLeft = "300px";
  }
  function closeNav() {
    document.getElementById("slideBar").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
  }
  </script>
</head>

<body>

  <h3>Lackbackers Headquarters</h3>
  <div id="map"></div>
  <script>
    function initMap() {
      var lackBack = new google.maps.LatLng(-27.4983477, 153.0123124);
      var map = new google.maps.Map(document.getElementById('map'), {
      center: lackBack,
      zoom: 14,
      zoomControl: false,
      scrollwheel: false,
      disableDoubleClickZoom: true,
      mapTypeControl: false,
      fullscreenControl: false,
      streetViewControl: false,
      navigationControl: false,
      scaleControl: false,
      draggable: false,
      mapTypeId: 'terrain'
      });
      var marker = new google.maps.Marker({
        position: lackBack,
        map: map
      });
    }
  </script>

  <script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBctTtjL3tGAJ2KZ191-8ClCRIpRZgNPz4&callback=initMap">
  </script>

</body>
</html>

<?php
require '../includes/footer.php';
?>
