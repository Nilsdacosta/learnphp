<?php

    $repetitions = 0;

    while ($repetitions < 10)
    {
        echo "<p>Je ne dois pas copier sur mon voisin " . $repetitions . " fois</p>";
        $repetitions++;
    }

    for ($i = 0; $i < 10; $i++)
    {
        echo "<p>C'est pas très bien ". $i ." fois</p>";
    }

?>