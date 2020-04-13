<?php

// echo phpinfo();

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        
        <!-- htmlspecialchars empeche l'injection de balise html dans le formulaire et donc de JS => <script> -->
        <!-- strip_tags detecte et retire les balise html -->
        <p>Bonjour <?php echo strip_tags($_POST['prenom']); ?> <br>
            <?php 
                if(isset($_POST['vegetarien']))
                {
                    echo 'Je suis vegetarien';
                }
                else{
                    echo 'Je ne suis pas végé';
                }
            ?>
        </p>
        
    </body>
</html>