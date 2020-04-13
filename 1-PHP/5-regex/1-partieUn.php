<?php

// LISTE DES METACARACTERES
// # ! ^ $ ( ) [ ] { } ? + * . \ |


// prg_match permet de vérifier si le mot guitare est présent dans le texte J'aime la guitare
// Les # délimite le début et la fin mais on peut le faire avec n'importe quel signe
// Le i après # signifie de ne pas prendre en compte les majuscule
// Le | demande qu'une valeur ou une autre soit présente
// Le $ demande à ce que php soit écrit à la fin du texte à vérifier
if(preg_match("#guitaRe$|banjo#i", 'J\'aime la guitare'))
{
    echo "Vrai";
    echo "<br>";
}
else{
    echo "Faux";
    echo "<br>";
}

// ^ demande à ce que le mot soit en début de phrase
if(preg_match("#^PHP#i", "PHP c'est stylé ! Vive PHP"))
{
    echo "Vrai";
    echo "<br>";
}
else
{
    echo "Faux";
    echo "<br>";
}

// [] demande si le mot existe et si une des lettres i a o est présente dans ce mot
if(preg_match("#gr[iao]s#i", "La nuit tout les chats sont gris"))
{
    echo "Vrai";
    echo "<br>";
}
else
{
    echo "Faux";
    echo "<br>";
}

// [a-z] définit une intervalle: on peut mettre plusieurs intervalle
if(preg_match("#gr[a-zA-Z0-9]s#", "La nuit tout les chats sont gris"))
{
    echo "Vrai";
    echo "<br>";
}
else
{
    echo "Faux";
    echo "<br>";
}

// l'ajout de ^ equivaut à une negation. On recherche tout les <h[nom compris entre 1 et 6]>
if(preg_match("#<h[^1-6]#", "La nuit tout <h6>les chats</h6> sont gris"))
{
    echo "Vrai";
    echo "<br>";
}
else
{
    echo "Faux";
    echo "<br>";
}

// La chaine Ay(ay) demande qu'on recherche Ayay ou juste ay
// Le ? demande si le mot est présent 1 ou 0 fois. Facultatif mais pas plus d'une fois
// Le + demande si il y est au moins une fois. Obligatoire donc
// Le * demande si il est présent 0 1 ou plusieurs fois. Juste facultative 
// Ces symboles s'appliquent à la lettre de devant ! donc pour un mot il faut des ()
if(preg_match("#Ay(ay)*#", "Ayay"))
{
    echo "Vrai";
    echo "<br>";
}
else
{
    echo "Faux";
    echo "<br>";
}

// {3} demande si il est présent 3 fois
// POur vérifier qu'il y a exactement 3 fois on rajoute ^ au début et $ à la fin
if(preg_match('#^(pre){3}$#', 'preprepre'))
{
    echo "Vrai";
    echo "<br>";
}
else
{
    echo "Faux";
    echo "<br>";
}

// On demande de 3 à 6 chiffre entre 0 et 9
// On peut ecrire {3,} ce qui demande un minimum de 3 chiffres
if(preg_match('#^[0-9]{3,6}$#', '799000'))
{
    echo "Vrai";
    echo "<br>";
}
else
{
    echo "Faux";
    echo "<br>";
}

?>