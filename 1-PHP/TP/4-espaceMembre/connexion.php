<?php

session_start();

require_once('inc/bdd.php');

// debug();

// A l'arrivée sur la page connexion je vérifie si les cookies sont activés et si l'utilisateur ne vient pas de se déconnecter
if(isset($_COOKIE['pseudo']) && isset($_COOKIE['password']) && !isset($_GET['deconnexion']))
{
    $_SESSION['pseudo'] = $_COOKIE['pseudo'];
    header('location:accueil.php');
}

if($_POST)
{
    // Récupration des informations en BDD pour vérifier si les données rentrés correspondent.
    $reqIdentifiant = $bdd->prepare('SELECT * FROM membre WHERE pseudo = :pseudo');
    $reqIdentifiant->bindvalue('pseudo', $_POST['pseudo'], PDO::PARAM_STR);
    $reqIdentifiant->execute();

    $identifiant = $reqIdentifiant->fetch();

    // rowcount() == 1 vérifie qu'il y ait bien une valeur qui corresponde en BDD
    if($reqIdentifiant->rowcount() == 1 && $identifiant['password'] == password_verify($_POST['password'], $identifiant['password']) )
    {
        // Si la case rester connecté est activé j'enregistre les données en cookies pour une connexion automatique
        if(isset($_POST['check']) && $_POST['check'] == 'on')
        {
            setcookie('pseudo', $_POST['pseudo'], time() + 365*24*3600, null, null, false, true);
            setcookie('password', $identifiant['password'], time() + 365*24*3600, null, null, false, true);
            $_SESSION['pseudo'] = $_POST['pseudo'];
            header('location:accueil.php');
        }
        else
        {
            $_SESSION['pseudo'] = $_POST['pseudo'];
            header('location:accueil.php');
        }
    }
    else
    {
        $msg = 'Identifiant ou mdp inccorect';
    }
}

require_once('inc/header.php');
?>
<?= $msg ?>
<form action="connexion.php" method="post" class="form-group">
    <div class="form-group">
        <label for="pseudo">Pseudonyme</label>
        <input type="text" class="form-control" name="pseudo" id="pseudo">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" id="password">
    </div>
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="check" name="check">
        <label class="form-check-label" for="check">Rester connecté</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php require_once('inc/footer.php') ?>