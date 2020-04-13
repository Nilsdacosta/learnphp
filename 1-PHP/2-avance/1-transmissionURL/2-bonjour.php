<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>
        <?php
            // Ajout de protocole de sécurité sensé vérifier que les informations demandés sont exactes.
            // isset verifie que les variables sont bien présentes
            if(isset($_GET['nom']) && isset($_GET['age']) && isset($_GET['repeat']))
            {
                // Ici on demande à ce que $_GET['repeat'] sois bien un nombre entier
                $nombreDeRepetition = (int) $_GET['repeat'];
                if($nombreDeRepetition > 1 && $nombreDeRepetition < 10)
                {
                    for($repetition = 0; $repetition <= $nombreDeRepetition; $repetition++)
                    {
                        echo 'Bonjour ' . $_GET['nom'] .' '. $_GET['age'] . '<br>';
                    }
                }
            }
            else
            {
                echo 'Les informations passés en paramètres ne sont pas correctes';
            }
        ?>
    </p>

    <?php

        print_r($_GET);

    ?>
</body>
</html>