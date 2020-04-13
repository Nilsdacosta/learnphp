<?php

session_start();

require_once('inc/bdd.php');

debug($_SESSION);
if($_GET['deconnexion'] == 1)
{
    $msg = "heho";
    session_destroy();
    header('location:connexion.php?deconnexion=1');
}
else
{
    $msg = "erreur";
}

?>

<?= $msg ?>