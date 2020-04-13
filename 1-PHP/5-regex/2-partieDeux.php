<?php

// Le point indique qu'il peut y avoir n'importe quelle caractère
// Si vide : faux
if(preg_match('#.{3}#', '1535'))
{
    echo "Vrai";
    echo "<br>";
}
else
{
    echo "Faux";
    echo "<br>";
}

// Si je veux chercher la présence d'un point je dois l'échapper.
// Même chose pour les ?
if(preg_match('#\.#', 'ca va.'))
{
    echo "Vrai";
    echo "<br>";
}
else
{
    echo "Faux";
    echo "<br>";
}

// Valider la forme d'une date
if(preg_match('#^([0-9]{2}/){2}[0-9]{4}$#', '05/09/1994'))
{
    echo "Vrai";
    echo "<br>";
}
else
{
    echo "Faux";
    echo "<br>";
}

// Preg_replace sert a remplacer un caractere
// Ici j'isole jour mois et année dans des paranthèses. Ce qui me permet de les appellé par un nom de variable automatique : $1 $2 $3
// Après la premiere , je peux appeller mes variables comme je le souhaite
$annee = preg_replace('#^([0-9]{2})/([0-9]{2})/([0-9]{4})$#', '$3-$2-$1' ,'05/09/1994');
echo $annee;
?>