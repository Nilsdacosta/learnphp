<?php

    if(isset($_POST) && $_POST['mdp'] == 'kangaroo')
    {
        $reponse = 'Vous avez le bon mdp';
    }
    else
    {
        header('location: formulaire.php');
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
        <p><?php echo $reponse; ?></p>
    </body>
</html>