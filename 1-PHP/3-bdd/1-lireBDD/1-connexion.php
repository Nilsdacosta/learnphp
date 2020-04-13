<?php 

    $bdd = new PDO('mysql:host=localhost;dbname=testocr', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    // l'array nous permet de récupérer les erreurs SQL

    // Le nom de l'hote
    // Le nom de la BDD
    // Le login
    // Le mot de passe
    // Le traitement des erreurs

    // On peut utiliser le try and catch pour afficher les erreurs.
    // try test le script et quand il détecte une erreur arrete le script. Catch l'erreur et l'affiche 
    /*
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
    }
    catch (Exception $e)
    {
            die('Erreur : ' . $e->getMessage());
    }
    */
?>