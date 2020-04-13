<?php
    
    $bdd = new PDO('mysql:host=localhost;dbname=testocr', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    // Récupération de toutes les données dans la table jeux_video
    $response = $bdd->query('SELECT * FROM jeux_video');

    // Récupération de données spécifiques dans jeux_video ou la valeur console = NES OU PC dans l'ordre des prix croissant limmité à 5 entrées
    $responseConsoleNom = $bdd->query('SELECT console, nom, prix FROM jeux_video WHERE console="NES" OR console="PC" ORDER BY prix ASC LIMIT 5');

    // Récupération des données anvoyés par un utilisateur
    // On prépare la requête que l'on va vouloir executer dans un premier temps
    $responseUser = $bdd->prepare('SELECT * FROM jeux_video WHERE console = :console');
    $responseUser->execute(array('console' => $_GET['console']));

    while ($donnees = $responseUser->fetch())
    {
        echo '<p>' . $donnees['console'] . " - " . $donnees['nom'] . " - " . $donnees['prix'] . "€" . '</p>';
    }

    // Ce la signifie qu'on a terminé le travail sur cette requête => évite les potentiel erreur avec d'autre requête
    $responseUser->closeCursor();

?>