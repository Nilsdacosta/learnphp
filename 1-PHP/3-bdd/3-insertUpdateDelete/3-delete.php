<?php
    
    $bdd = new PDO('mysql:host=localhost;dbname=testocr', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));


    // Suppression en BDD
    $responseUser = $bdd->prepare('DELETE FROM jeux_video WHERE id = 30');

    $responseUser->execute();


    // Ce la signifie qu'on a terminé le travail sur cette requête => évite les potentiel erreur avec d'autre requête
    $responseUser->closeCursor();

?>