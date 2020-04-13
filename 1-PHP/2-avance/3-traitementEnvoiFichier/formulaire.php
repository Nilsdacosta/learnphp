<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        
        <!-- Pour traiter un fichier dans le form il faut rajouter l'ENCTYPE -->
        <form action="traitement.php" method="POST" enctype="multipart/form-data">
            <!-- Et un input type file -->
            <input type="file" name="monfichier">
            <br>
            <input type="submit" value="Envoyer">
        </form>
        
    </body>
</html>