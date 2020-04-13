<?php 

$bdd = new PDO('mysql:host=localhost;dbname=ocrblog', 'root', '', array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => "Set NAMES utf8",
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC)
);

if(isset($_GET))
{
    // Récupération de l'article concerné grâce à $_GET
    $recuperationArticle = $bdd->prepare('SELECT * FROM article WHERE id_article = :article');
    $recuperationArticle->bindValue(":article", $_GET['articleId'], PDO::PARAM_STR);
    $recuperationArticle->execute();

    // Sauvegarde du contenu de l'article avec des variables
    $affichageArticle = $recuperationArticle->fetch();
    $titre = $affichageArticle['titre'];
    $contenu = $affichageArticle['contenu'];
    $dateCreation = $affichageArticle['date_creation'];

    // print "<pre>";
    //     print_r($affichageArticle);
    // print "</pre>";  

    // On entre les données en BDD si tout les champs commentaires sont entrés. L'id de l'article passe par le $_GET récupéré au préalable et la date est celle du jour
    if(!empty($_POST['auteur']) && !empty($_POST['commentaire']))
    {
        $insertionCommentaire = $bdd->prepare('INSERT INTO commentaire(fk_article, auteur, contenuCommentaire, dateCommentaire) VALUES(:article, :auteur, :commentaire, NOW())');
        $insertionCommentaire->bindValue('article', $_GET['articleId'], PDO::PARAM_INT);
        $insertionCommentaire->bindValue('auteur', $_POST['auteur'], PDO::PARAM_STR);
        $insertionCommentaire->bindValue('commentaire', $_POST['commentaire'], PDO::PARAM_STR);
        $insertionCommentaire->execute();
        header('location:commentaire.php?articleId='.$_GET['articleId']);
    }

    // Récupération des commentaires
    $requeteCommentaires = $bdd->query('SELECT * FROM commentaire WHERE fk_article = ' . $_GET["articleId"] . ' ORDER BY dateCommentaire DESC');
    $recuperationCommentaires = $requeteCommentaires->fetchAll();
    // print "<pre>";
    //     print_r($recuperationCommentaires);
    // print "</pre>";  
}



?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>

    <a href="blog.php">Retour aux articles</a>

    <div style="background-color: red">
        <h1><?= $titre ?></h1>
        <p><?= $contenu ?></p>
        <p><?= $dateCreation ?></p>
    </div>
        

        <?php
            foreach($recuperationCommentaires as $recuperationCommentaire)
            {
                echo "<h3>" . strtoupper($recuperationCommentaire['auteur']) . "</h3>";
                echo "<p>" . $recuperationCommentaire['contenuCommentaire'] . "</p>";
                echo "<p>" . $recuperationCommentaire['dateCommentaire'] . "</p>";
            }
        ?>


        <form action="commentaire.php?articleId=<?=$_GET['articleId']?>" method="post">

            <label for="auteur">Votre nom/pseudo</label>
            <br>
            <input type="text" name="auteur" id="auteur">
            <br>
            <label for="commentaire">Votre commentaire</label>
            <br>
            <textarea name="commentaire" id="commentaire" cols="30" rows="10" placeholder="Votre commentaire ici =>"></textarea>
            <br>
            <input type="submit" value="Commenter">
        </form>

    </body>
</html>