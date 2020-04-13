<?php 
    //phpinfo();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <h2>Page de test</h2>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea, maxime magnam minima quaerat, debitis quo aperiam ex dolorum deserunt consequatur quidem nemo?
            <br>
            <?php
                echo "aujourd'hui nous sommes le " . date('d/m/Y H:i:s:e') . ".";
            ?>
            <br>
            Recusandae, fugiat blanditiis! Voluptate natus necessitatibus dignissimos. Debitis!
        </p>
        <ul>
            <li style="color:blue;">Text bleu</li>
            <li style="color: red;">Text rouge</li>
            <li style="color: green;">Text vert</li>
        </ul>
    </body>
</html>