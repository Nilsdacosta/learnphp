<?php
    $phrase = "Bonjour je suis une phrase";

// Fonction strlen() donne le nbr de caractère
    $nombreDeCaractere = strlen($phrase);
    echo $nombreDeCaractere . '<br>';

// Fonction str_shuffle()
    $phraseMelange = str_shuffle($phrase);
    echo $phraseMelange . '<br>';

// Fonction strtolower()
    $phraseMelange = strtolower($phrase);
    echo $phraseMelange . '<br>';

// Fonction strtoupper()
    $phraseMelange = strtoupper($phrase);
    echo $phraseMelange . '<br>';

// Fonction date() qui récupère l'élément de la date actuelle que l'on souhaite
    echo date('d/M/Y'). '<br>';

// Fonction perso
    function direAurevoir($nom){
        echo 'Aurevoir ' . $nom;
    }
    echo direAurevoir('Nils') . '<br>';

    function calculCone($rayon, $hauteur)
    {
        $volume = $rayon * $rayon * 3.14 * $hauteur * (1/3);
        return $volume;
    }

    $volume = calculCone(5, 2);
    echo  'Le cone mesure ' . $volume .'cm<sup>3</sup> <br>';
?>