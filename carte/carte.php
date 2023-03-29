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
  <h1>Tout d'abord récupérer les coordonnées</h1>
    <html>

<script>
function envoyer(){
    //Récuppération des valeurs saisies pas l'utilisateur
	var rue = document.getElementById('rue').value;
    var ville = document.getElementById('code').value;
    
	//API issu de https://adresse.data.gouv.fr/api-doc/adresse
	
	//Création de l'object Ajax
	var req= new XMLHttpRequest();
    //Préparation de requette
	req.open("GET","https://api-adresse.data.gouv.fr/search/?q="+rue+"&postcode="+ville,false); 
    //Envois de l'information au serveur
	req.send(null); 
    //Reception et affichage du résultat
	var geocodeObjet = JSON.parse(req.responseText);
    
    //Filtre pour récuppérer uniquement les valeurs GPS de l'adresse
    var long = geocodeObjet.features[0].geometry.coordinates[0];
    var lat = geocodeObjet.features[0].geometry.coordinates[1];

    document.getElementById('result').innerHTML="Long "+long+"</br>Lat "+lat;
    
}    
</script>

<p>Adresse <input id="rue"/></p>
<p>Code postal <input id="code"/></p>
<button onclick="envoyer()">Envoyer</button>
<p id="result"></p>







    <hr>

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

    <hr>

    

  </body>
</html>
