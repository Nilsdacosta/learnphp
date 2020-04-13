<?php 

$bdd = new PDO('mysql:host=localhost;dbname=exofacile', 'root', '', array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => "Set NAMES utf8",
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC)
);

// Afficher les 10 villes les plus peuplés de France en 2012
$reqdixVillesPeuples = $bdd->query('SELECT * FROM villes_france_free ORDER BY ville_population_2012 DESC LIMIT 0, 10');

$dixVillesPeuples = $reqdixVillesPeuples->fetchAll();
echo "<h3> Top 10 Ville nb habitants </h3>";
foreach($dixVillesPeuples as $villeTopDix)
{
    echo $villeTopDix['ville_nom_reel'] . " avec : " . $villeTopDix['ville_population_2012'] . "hab ! <br>";
    
}
echo "<hr>";

// Liste des 50 villes avec la plus faible superficie
$reqcinquanteSuperficieFaible = $bdd->query('SELECT ville_nom_reel, ville_surface, ville_departement FROM villes_france_free ORDER BY ville_surface ASC LIMIT 0, 50');

$cinquanteSuperficieFaibles = $reqcinquanteSuperficieFaible->fetchAll();
echo "<h3> Top 50 Villes superficie faible </h3>";
foreach($cinquanteSuperficieFaibles as $cinquanteSuperficieFaible)
{;
    echo $cinquanteSuperficieFaible['ville_nom_reel'] . " dans le " . $cinquanteSuperficieFaible['ville_departement'] . " avec : " . $cinquanteSuperficieFaible['ville_surface'] . " km² ! <br>";
}
echo "<hr>";

// Liste departement Outremer
$reqdepOM = $bdd->query("SELECT * FROM departement WHERE departement_code LIKE '97%'");

$departementOMs = $reqdepOM->fetchall();
echo "<h3> Top 50 Villes superficie faible </h3>";
foreach($departementOMs as $departementOMs)
{;
    echo $departementOMs['departement_nom'] . "<br>";
}
echo "<hr>";


// Afficher les 10 villes les plus peuplés de France en 2012 + departement
$reqdixVillesPeuplesDepartement = $bdd->query('SELECT v.ville_nom_reel nomVille, v.ville_population_2012 population2012 , d.departement_nom nomDepartement 
FROM villes_france_free v
INNER JOIN departement d
ON v.ville_departement = d.departement_code
ORDER BY ville_population_2012 DESC 
LIMIT 0, 10');

$dixVillesPeuplesDepartement = $reqdixVillesPeuplesDepartement->fetchAll();
echo "<h3> Top 10 Ville nb habitants </h3>";
foreach($dixVillesPeuplesDepartement as $villeTopDixdepartement)
{
    echo $villeTopDixdepartement['nomVille'] . " avec : " . $villeTopDixdepartement['population2012'] . "hab dans le departement : ".$villeTopDixdepartement['nomDepartement']." ! <br>";
    
}
echo "<hr>";

// Classement des Département avec le plus de villes
$reqdepartementParVille = $bdd->query('SELECT d.departement_nom nomDepartement, d.departement_code codeDepartement, v.ville_departement departementVille
FROM departement d
INNER JOIN villes_france_free v
ON d.departement_code = v.ville_departement
GROUP BY codeDepartement
ORDER BY COUNT(departementVille) DESC
LIMIT 10');

echo "<h3> TOP 10 : Le plus de villes dans un departement </h3>";
$classementDepartementVilles = $reqdepartementParVille->fetchAll();
foreach($classementDepartementVilles as $classementDepartementVille)
{
    echo  $classementDepartementVille['nomDepartement'] . "<br>";
}
echo "<hr>";

// TOP 10 : Departement superficie
$reqDepartementSuperficie = $bdd->query ('SELECT d.departement_nom nomDepartement, d.departement_code codeDepartement, v.ville_surface superficieVilles
FROM departement d
INNER JOIN villes_france_free v
ON d.departement_code = v.ville_departement
GROUP BY codeDepartement
ORDER BY SUM(superficieVilles) DESC
LIMIT 10
');

echo "<h3> TOP 10 : departement les plus grands </h3>";
$classementDepartementSuperficies = $reqDepartementSuperficie->fetchAll();
foreach($classementDepartementSuperficies as $classementDepartementSuperficie)
{
    echo  $classementDepartementSuperficie['nomDepartement'] . "<br>";
}
echo "<hr>";

// Nombre de villes commençant par SAINT
$reqSaint = $bdd->query('SELECT COUNT(ville_nom_simple) FROM villes_france_free WHERE ville_nom_simple LIKE "saint%"');

echo "<h3> Nombre de villages avec début Saint </h3>";
$affichageSaints = $reqSaint->fetch();
foreach($affichageSaints as $key => $value)
{
    echo "Il y a " . $value . " village avec saint au début <br>";
}
echo "<hr>";

// Nombre de villes avec le même nom top 10
$reqMemeNom = $bdd->query("SELECT ville_nom, COUNT(*) AS nbt_item 
                            FROM `villes_france_free` 
                            GROUP BY `ville_nom` 
                            ORDER BY nbt_item DESC
                            LIMIT 0, 10");

echo "<h3>Top 10: Nombre de villages avec le même nom </h3>";
$affichageVillages = $reqMemeNom->fetchAll();
foreach($affichageVillages as $affichageVillage)
{
    echo "Il y a " . $affichageVillage['nbt_item'] . " " . $affichageVillage['ville_nom'] . "<br>";
}
echo "<hr>";

// echo "<pre>";
//     print_r();
// echo "</pre>";
?>