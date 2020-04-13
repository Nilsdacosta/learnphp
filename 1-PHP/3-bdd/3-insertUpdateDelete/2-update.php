<?php
    
    $bdd = new PDO('mysql:host=localhost;dbname=testocr', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));


    // Update des BDD
    $req = $bdd->prepare('UPDATE jeux_video SET prix = :nvprix, nbre_joueurs_max = :nv_nb_joueurs WHERE nom = :nom_jeu');
    
    $req->execute(array(
        'nvprix' => $nvprix,
        'nv_nb_joueurs' => $nv_nb_joueurs,
        'nom_jeu' => $nom_jeu
    ));

?>