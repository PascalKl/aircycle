<!DOCTYPE html>
<html class="wide wow-animation" >
  <head>
    <title>AirCycle - Map</title>
    <?php include 'parts/head.php'; ?>
    <style>
        #map {
  height: 75vh; /* The height is 400 pixels */
  width: 100vw; /* The width is the width of the web page */
}
    </style>
<?php 

    include 'functions.php';
    include 'databasehelper.php';

?>
  </head>
  <body>
    <?php include 'parts/header.php' ?>
  <div class="page"> 
  <div id="map"></div>
      <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCS59Sw9hjIuBvsNbtsr69CJ7SC6T6bKVw&callback=initMap&v=weekly"
      defer
    ></script>
    <script>
        const zoomLevel = 10;
        const dataJSON = {
            <?php echo getData(); ?>
        };
        // Initialize and add the map
        const circles = [];
        function initMap() {
            const map = new google.maps.Map(document.getElementById("map"), {
    zoom: zoomLevel,
    center: { lat: 54.16738, lng: 9.85437 },
  });
  for( const data in dataJSON){
    airquality = parseInt(dataJSON[data].airquality);
    if(airquality <= 50){
        color = "#2bab8c";
    }
    else if(airquality <= 100){
        color = "#f1e266";
    }
    else if(airquality <= 150){
        color = "#edad66";
    }
    else if(airquality <= 200){
        color = "#c73a66";
    }
    else if(airquality <= 250){
        color = "#8245b7";
    }
    else if(airquality <= 300){
        color = "#8b3959";
    }
    const dataCircle = new google.maps.Circle({
        strokeColor: color,
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: color,
        fillOpacity: 0.35,
        map,
        center: {lat: parseFloat(dataJSON[data].lat), lng: parseFloat(dataJSON[data].lng)},
        radius: parseInt(dataJSON[data].radius),
    });
    circles.push(dataCircle);
  }
  const minCircle = 1000 - (zoomLevel - 10) * 100;
        for (const circle in circles){
            for(const iCircle in circles){
                c = circles[circle];
                iC = circles[iCircle];
                const spacing = calcCrow(c.center.lat, c.center.lng, iC.center.lat, iC.center.lng);
                if(spacing <= minCircle){
                    iCircle.setMap(null);
                    console.log("Test");
                }
            }
        }
    }
        window.initMap = initMap;

    //This function takes in latitude and longitude of two location and returns the distance between them as the crow flies (in km)
    function calcCrow(lat1, lon1, lat2, lon2) 
    {
      var R = 6371; // km
      var dLat = toRad(lat2-lat1);
      var dLon = toRad(lon2-lon1);
      var lat1 = toRad(lat1);
      var lat2 = toRad(lat2);

      var a = Math.sin(dLat/2) * Math.sin(dLat/2) +
        Math.sin(dLon/2) * Math.sin(dLon/2) * Math.cos(lat1) * Math.cos(lat2); 
      var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
      var d = R * c;
      return d;
    }

    // Converts numeric degrees to radians
    function toRad(Value) 
    {
        return Value * Math.PI / 180;
    }
    </script>
      <?php include 'parts/footer.php'; ?>
    <div class="snackbars" id="form-output-global"></div>
    <script src="theme/js/core.min.js"></script>
    <script src="theme/js/script.js"></script>
  </body>
</html>