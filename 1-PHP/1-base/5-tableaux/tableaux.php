<?php

$prenom[0] = "Mathieu";
$prenom[1] = "Marie";
$prenom[2] = "Robert";

$prenoms = array('Mathieu', 'Marie', 'Robert');

echo $prenom[1];
echo "<br>";
echo $prenoms[1];
echo "<br>";

echo "<pre>";
echo print_r($prenoms);
echo "</pre>";

$personne = array(
    'nom' => "Da Costa",
    'prenom' => "nils",
    'age' => 25);
print_r($personne);

for($i = 0; $i < 3; $i++)
{
    echo '<p>' . $prenoms[$i] . '</p>';
}

foreach($prenoms as $nom)
{
    echo '<p>' . $nom . '</p>';
}

foreach($personne as $key => $value)
{
    echo '<p>'. $key . '=>' . $value . '</p>';
}

// FONCTION array_key_exist
$cle = 'prout';
if(array_key_exists($cle, $personne))
{
    echo 'La clé \''.$cle.'\' existe dans l\'array personne <br>';
}else
{
    echo 'la clé \''.$cle.'\' n\'éxiste pas <br>';
}

// FONCTION array_search
echo array_search('nils', $personne) . '<br>';


// FONCTION in_array
$fruits = array ('Banane', 'Pomme', 'Poire', 'Cerise', 'Fraise', 'Framboise');

if (in_array('Myrtille', $fruits))
{
    echo 'La valeur "Myrtille" se trouve dans les fruits !';
}

if (in_array('Cerise', $fruits))
{
    echo 'La valeur "Cerise" se trouve dans les fruits !';
}
?>
