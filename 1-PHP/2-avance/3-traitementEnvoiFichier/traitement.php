<?php

    // Vérification de la présence du fichier
    if(isset($_FILES['monfichier']) && $_FILES['monfichier']['error'] == 0)
    {
        // Vérification de la taille du fichier
        if($_FILES['monfichier']['size'] <= 10000000)
        {
            // pathinfo récupère les informations du fichier envoyé
            $infosFichier = pathinfo($_FILES['monfichier']['name']);
            
            // On peut dont récupérer son extension pour le traiter
            $extensionUpload = $infosFichier['extension'];

            // On crée un tableau d'extensions autorisés
            $extensionAutorises = array('jpg','png', 'gif', 'jpeg');

            // in_array compare si une valeur se trouve dans un tableau trad : est ce que on retrouve extensionUpload dans le tableau extensionAutorises
            if (in_array($extensionUpload, $extensionAutorises))
            {
                // move_upload_file va déplacer un fichier telechargé
                // prend 2 paramètres : le nom temporaire du fichier $_FILES['monfichier']['tmp_name'] et le chemin de destination
                // basename récupère le nom du fichier plutôt que tout le chemin qui va avec
                // On peut concatener d'autre protocole pour éviter d'avoir 2 fois le même nom de fichier. Ce qui ecrasera l'ancien
                move_uploaded_file($_FILES['monfichier']['tmp_name'], 'upload/' . basename($_FILES['monfichier']['name']));
            }
        }
    }

?>