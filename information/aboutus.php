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
  <style>
  #main {
    transition: margin-left .5s;
    padding: 16px;
  }
  #map {
    height: 500px;
    width: 1080px;
  }
  </style>

  <script>
    function initMap() {
      var lackBack = new google.maps.LatLng(-27.4983477, 153.0123124);
      var map = new google.maps.Map(document.getElementById('map'), {
      center: lackBack,
      zoom: 12,
      scrollwheel: false,
      mapTypeControl: false,
      fullscreenControl: false,
      streetViewControl: false,
      navigationControl: false,
      scaleControl: false,
      mapTypeId: 'roadmap'
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
</head>

<body>

  <h3>Lackbackers Headquarters</h3>
  <div align="center" id="map"></div>


</body>
</html>

<?php
require '../includes/footer.php';
?>
