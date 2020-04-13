<?php 

    $age = 19;

    if($age <= 17)
    {
        echo 'salut gamin <br>';
    }
    else if($age == 18)
    {
        echo 'bravo <br>';
    }
    else
    {
        echo 'bonjour Collègue <br>';
    }

    $adulte = true;
    if(!$adulte)
    {
        echo 'tu es adulte';
    }
    else
    {
        echo 'tu es un enfant';
    }

    $nom = "Bernard";
    if($adulte && $nom == "Bernard")
    {
?>
<p>Boonjour Bernard</p>
<?php
    }

    switch($age)
    {
        case 4;
            echo "Tu as 4ans";
            break;
        case 16;
            echo "Tu as 16 ans";
            break;
        case 18;
            echo "Tu as 18 ans";
            break;
    }
?>

<?php

// Ternaire
    $majeur = ($age >= 18) ? true : false;

    if($majeur)
    {
        echo "Tu es majeur";
    }
    else{
        echo "tu es mineur";
    }

?>