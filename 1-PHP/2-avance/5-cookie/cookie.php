<?php
    // On utilise time() pour récupérer le time actuelle et on rajoute quand on veut qu'il se supprime.
    // Les cookies sont des mini fichiers stockés sur l'ordi d'un visiteur
    setcookie('pseudo', 'M@teo21', time() + 365*24*3600, null, null, false, true); // On écrit un cookie
    setcookie('pays', 'France', time() + 365*24*3600, null, null, false, true); // On écrit un autre cookie...

    // Et SEULEMENT MAINTENANT, on peut commencer à écrire du code html
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <p>On récupère l'info d'un cookie avec la superglobale $_COOKIE['nomVariable']</p>
    <p>Ici le pseudo => <?php echo $_COOKIE['pseudo']; ?></p>
    
</body>
</html>