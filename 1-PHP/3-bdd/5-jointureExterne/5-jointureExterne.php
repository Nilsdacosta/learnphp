<?php

$bdd = new PDO('mysql:host=localhost;dbname=ocrtest', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

// Les jointures externes permettent de récupérer toutes les données, même celles qui n'ont pas de correspondance.


$recuperationDonees =  $bdd->query("SELECT j.nom nom_jeu, p.prenom prenom_proprietaire
                                    FROM proprietaires p
                                    LEFT JOIN jeux_video j
                                    ON j.id_proprietaires = p.id_proprietaires");
                                
// echo "<pre>";
//     print_r();
// echo "</pre>";
$affichageDonnees = $recuperationDonees->fetchAll();
foreach($affichageDonnees as $affichageDonee)
{
    echo $affichageDonee['nom_jeu'] . " : " . $affichageDonee['prenom_proprietaire'] ."<br>";
}


?>