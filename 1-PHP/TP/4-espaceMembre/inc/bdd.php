<?php

$bdd = new PDO('mysql:host=localhost;dbname=ocrespacemembre', 'root', '', array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => "Set NAMES utf8",
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC)
);

// variable qui vas afficher les messages d'erreurs
$msg = "";

# Création d'une fonction de debug qui permettra de retourner des information d'appel de la fonction et qui nous permettra de choisir entre un print_r() et un var_dump()

function debug($var, $mode = 1)
{
    print "<div class='alert alert-warning' id='debug'>";
        
        # Appel à la fonction debug_backtrace() qui nous permet de retourner des informations à propos de l'endroit d'appel à la fonction (retourne un array multidimensionnel)
        $trace = debug_backtrace();

        # Je casse le comportement du tableau multidimensionnel pour me retourner le premier
        $trace = array_shift($trace);

        print "<p>Le debug a été appelé dans le fichier $trace[file] à la ligne $trace[line]</p>";

        print "<pre>";
            switch ($mode) {
                case '1':
                    print_r($var);
                    break;
                default:
                    var_dump($var);
                    break;
            }
        print "</pre>";

    print "</div>";
}

?>