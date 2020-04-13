<?php
    // On débute le script par ce header avant toutes balises html
    header ("Content-type: image/png");

    // Création d'image à partir d'une image vide grace à imagecreate(ici on met, sa taille)
    //$image = imagecreate(200, 500);
    // la variable $image contient une image qu'on affiche avec imagepng
    //imagepng($image);

    $imageDeux = imagecreatefromjpeg("fondCompetence.jpg");
    imagejpeg($imageDeux);
?>