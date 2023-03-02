<?php

function search_poi($name, $category, $location) {
    // Connexion à la base de données
    $conn = mysqli_connect("localhost", "user", "password", "my_database");
    
    // Requête SQL pour chercher les POI correspondants aux critères de recherche
    $query = "SELECT * FROM poi WHERE 1";
    if (!empty($name)) {
        $query .= " AND name LIKE '%$name%'";
    }
    if (!empty($category)) {
        $query .= " AND category = '$category'";
    }
    if (!empty($location)) {
        $query .= " AND location = '$location'";
    }
    
    // Exécution de la requête SQL
    $result = mysqli_query($conn, $query);
    
    // Traitement des résultats de la requête
    $poi_list = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $poi_list[] = $row;
    }
    
    // Fermeture de la connexion à la base de données
    mysqli_close($conn);
    
    // Retourne la liste des POI correspondants aux critères de recherche
    return $poi_list;
}

?>
