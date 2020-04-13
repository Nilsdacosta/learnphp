<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=chatocr;charset=utf8', 'root', '',  array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

$recuperationChats = $bdd->query("SELECT * FROM chat ORDER BY id_chat DESC LIMIT 10");


while($donnees = $recuperationChats->fetch())
{
    echo htmlspecialchars($donnees['pseudo'])  . " dit " . htmlspecialchars($donnees['message']) . "<hr>";
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




        <form action="chatPost.php" method="post">
            <label for="pseudo">Votre Pseudo</label>
            <br>
            <input type="text" name="pseudo" id="pseudo">
            <hr>
            <label for="message">Votre message</label>
            <br>
            <textarea name="message" id="message" cols="30" rows="10"></textarea>
            <hr>
            <input type="submit" value="Envoyer">
        </form>
    </body>
</html>