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
    <script src="https://openlayers.org/api/OpenLayers.js"
    async defer></script>
  </body>







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

</body>
</html>