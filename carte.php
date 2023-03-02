<!DOCTYPE html>
<html>
  <head>
  <link rel="stylesheet" href="/path/to/leaflet.css" />
<script src="/path/to/leaflet.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <title>Afficher une carte</title>
    <style>
      #map {
        height: 400px;
        width: 100%;
      }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css" />
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
        var map = L.map('map').setView([parseFloat(lat), parseFloat(long)], 13);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
          attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
          maxZoom: 18,
          tileSize: 512,
          zoomOffset: -1
        }).addTo(map);
        var marker = L.marker([parseFloat(lat), parseFloat(long)]).addTo(map);
      }
    </script>
  </body>
</html>
