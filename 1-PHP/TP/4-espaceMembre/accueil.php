<?php
session_start();

require_once('inc/bdd.php');

debug($_SESSION);


require_once('inc/header.php');
?>

<h1>Bienvenue à toi <?= $_SESSION['pseudo'] ?> </h1>

<form action="accueil.php" method="GET">

    <a href="deconnexion.php?deconnexion=1"><button type="button" class="btn btn-primary">Se déconnecter</button></a> 

</form>


<?php require_once('inc/footer.php') ?>