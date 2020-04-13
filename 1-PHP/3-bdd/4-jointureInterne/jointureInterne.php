<?php

$bdd = new PDO('mysql:host=localhost;dbname=ocrtest', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

// Les jointures internes ne selectionnent que les données qui ont une correspondance entre les deux tables;

                            // On demande les champs qui nous interresse : TABLE.CHAMPS + création d'alias avec AS
                            // On appelle les tables ou se trouve les champs
                            // Ou on a le champ correspondant. Pas besoin de FK
$reqinterne = $bdd->query("SELECT jeux_video.nom AS nomDuJeu, proprietaires.prenom AS prenomProprio
                            FROM proprietaires, jeux_video
                            WHERE jeux_video.id_proprietaires = proprietaires.id_proprietaires");

// echo "<pre>";
//     print_r();
// echo "</pre>";
// $recuperationDonees = $reqinterne->fetchAll();
// foreach($recuperationDonees as $recuperationDonee)
// {
//     echo $recuperationDonee['nomDuJeu'] . " : " . $recuperationDonee['prenomProprio'] ."<br>";
// }

                            // Une autre facon ou un alias est donnée au nom des champs. Ici jeux_video vaut j et proprietaire vaut p
$reqinterneDeux = $bdd->query("SELECT j.nom AS nom_jeu, p.prenom AS prenom_proprietaire
                            FROM proprietaires AS p, jeux_video AS j
                            WHERE j.id_proprietaires = p.id_proprietaires");



                                    //---------------------------//
                                    // Nouvelle manière de faire //
                                    //---------------------------//

// plus besoin du AS pour déclarer les alias
                                // FROM = table principale
                                // INNER JOIN = la table avec laquelle on veut la liaison
                                // ON les champs qui vont mettre en relation les deux tables
                                // On peut tout a fait rajouter d'autre conditions
$reqinterneTrois = $bdd->query("SELECT j.nom nom_jeu, p.prenom prenomProprio
                                FROM proprietaires p
                                INNER JOIN jeux_video j
                                ON j.id_proprietaires = p.id_proprietaires
                                WHERE j.console = 'Nintendo 64'
                                ORDER BY prix DESC
                                LIMIT 0,10");
                                
$recuperationDonees = $reqinterneTrois->fetchAll();
foreach($recuperationDonees as $recuperationDonee)
{
    echo $recuperationDonee['nom_jeu'] . " : " . $recuperationDonee['prenomProprio'] ."<br>";
}

?>