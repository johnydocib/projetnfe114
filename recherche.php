<p>ANNEE ? 
    <h1>Recherche de l'année</h1>
    <form>
        <input type="button" name="annee" id="annee">Recherche</input>
    </form>
    


<SELECT name="annee"><br>
   

    <?php
    
    //1° - Connexion à la BDD
    $base = new PDO('mysql:host=localhost; dbname=id20206067_movies', 'id20206067_docib', 'Carnet741852@');
    $base->exec("SET CHARACTER SET utf8");
    
    //2° - Préparation de requette et execution
    $retour = $base->query('SELECT DISTINCT annee FROM movies;');
    
    //3° - Lecture du resultat de la requette
    while ($data = $retour->fetch()){
    echo "<option>".$data['annee']."</option>";
    }
    
    ?>
    </SELECT>
    </p>