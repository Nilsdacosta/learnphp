<?php

$bdd = new PDO('mysql:host=localhost;dbname=ocrblog', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

if(!empty($_POST['titre']) && !empty($_POST['contenu']))
{
    $billet = $bdd->prepare('INSERT INTO article(titre, contenu, date_creation) VALUES(:titre, :contenu, NOW())');
    $billet->bindValue(":titre", $_POST['titre'], PDO::PARAM_STR);
    $billet->bindValue(":contenu", $_POST['contenu'], PDO::PARAM_STR);
    $billet->execute();
    header('location:blog.php');
}

$recuperationArticles = $bdd->query('SELECT * FROM article ORDER BY date_creation');
$affichageArticles = $recuperationArticles->fetchAll();



?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <h1>Les Articles</h1>
        <?php
            foreach($affichageArticles as $affichageArticle)
            {
                foreach($affichageArticle as $key => $value)
                {
                    if($key === 'titre')
                    {
                        echo "<h3>" . strtoupper($value) . "</h3>";
                    }
                    if($key === 'contenu')
                    {
                        echo "<p>" . ($value) . "</p>";
                    }
                    // print "<pre>";
                    //     print_r($affichageArticle);
                    // print "</pre>";  
                }
                echo "<a href='commentaire.php?articleId=" . $affichageArticle['id_article'] . "'>commentaires</a>";
        ?>

        <?php
                print "<hr>";
                
            }
        ?>


        <form action="blog.php" method="post">
            <label for="titre">titre</label>
            <br>
            <input type="text" name="titre" id="titre">
            <br>
            <label for="contenu">contenu</label>
            <br>
            <textarea name="contenu" id="contenu" cols="30" rows="10"></textarea>
            <br>
            <input type="submit" value="Envoyer">
        </form>
    </body>
</html>