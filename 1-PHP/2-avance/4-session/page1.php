<?php
// On démarre la session AVANT d'écrire du code HTML
session_start();

    // Verification si les variable $_POST sont remplies pour continuer le script
    if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['age']))
    {
        // On stocke ici les infos récupéré par un $_POST
        $_SESSION['nom'] = $_POST['nom'];
        $_SESSION['prenom'] = $_POST['prenom'];
        $_SESSION['age'] = $_POST['age'];

        
    }

    // rajout d'un bouton déconnexion et du session_destroy pour supprimer les variables de session. Redirection vers la page principale
    if(isset($_POST['deco']))
    {
        session_destroy();
        header('location: page1.php');
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Titre de ma page</title>
    </head>
    <body>
        <form action="page1" method="post">
            <label for="nom">Nom</label>
            <input type="text" name="nom">
            <label for="prenom">Prenom</label>
            <input type="text" name="prenom">
            <label for="age">age</label>
            <input type="text" name="age">
            <input type="submit" value="Envoyer">
        </form>
        <?php if(!empty($_SESSION['nom']) && !empty($_SESSION['prenom']) && !empty($_SESSION['age'])) {?>
            <p>
                Salut <?php echo $_SESSION['prenom']; ?> !<br />
                Tu es à l'accueil de mon site (page1.php). Tu veux aller sur une autre page ?
            </p>
            <p>
                <a href="page2.php">Lien vers page2.php</a><br />
            </p>
            <form action="page1" method="post">

                <input name="deco" type="submit" value="Deconnexion">

            </form>
            
        <?php }
        else
        {
        ?>
            <p>Merci de remplir le formulaire</p>
        <?php
        } ?>
    </body>
</html>