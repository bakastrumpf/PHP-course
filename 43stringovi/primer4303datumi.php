<?php

    echo date("d.m.Y. H.i.s.");
    echo "<br>";
    echo date("d.m.y.");
    echo "<br>";

    $datum = mktime(20, 10, 0, 3, 11, 2023);
    echo $datum;
    echo " | ";
    echo date("d.m.Y.", $datum);
    echo " | ";
    var_dump(getdate());
    echo "<hr>";

?>