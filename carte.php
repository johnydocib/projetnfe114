<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <title>Afficher une carte</title>
    <style>
      #map {
        height: 400px;
        width: 100%;
      }
    </style>
  </head>
  <body>
    <form>
      <label for="latitude">Latitude:</label>
      <input type="text" id="latitude" name="latitude"><br><br>
      <label for="longitude">Longitude:</label>
      <input type="text" id="longitude" name="longitude"><br><br>
      <button type="button" onclick="afficherCarte()">Afficher</button>
    </form>
    <div id="map"></div>
    <script>
      function afficherCarte() {
        var lat = document.getElementById("latitude").value;
        var long = document.getElementById("longitude").value;
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: parseFloat(lat), lng: parseFloat(long)},
          zoom: 8
        });
        var marker = new google.maps.Marker({
          position: {lat: parseFloat(lat), lng: parseFloat(long)},
          map: map,
          title: 'Ma position'
        });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=VOTRE_CLE_API&callback=initMap"
    async defer></script>
  </body>
</html>
