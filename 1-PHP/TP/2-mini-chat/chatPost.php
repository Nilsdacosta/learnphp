
<?php

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=chatocr;charset=utf8', 'root', '',  array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

if(!empty($_POST['message']) && !empty($_POST['pseudo']))
{
    $entreChat = $bdd->prepare('INSERT INTO chat(pseudo, `message`) VALUES(:pseudo, :message)');
    $entreChat->execute(array(
        'pseudo' => $_POST['pseudo'],
        'message' => $_POST['message']
        ));
    echo "Message envoyé";
}



header("Location:chat.php");

?>
