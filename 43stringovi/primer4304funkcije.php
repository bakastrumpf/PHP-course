<?php

    // include_once "primer4305pomocni1.php";
    include "primer4305pomocni.php";
    // require "primer4305pomocni1.php";

function ispis($tekst){
    echo "Ispis: ";
    echo $tekst;
    echo "<br>";
}

ispis("Marija");
ispis("Nova godina");

echo "<hr>";

function kvBroja($a){
    return $a * $a;
}

ispis("Kvadrat broja je " .kvBroja(8));

echo "<hr>";

function sumaNiza($brojevi){
    $suma = 0;
    // for($i = 0; $i < count($brojevi); $i++){
    //     $suma += $brojevi;
    // }

    foreach($brojevi as $broj){
        $suma += $broj;
    }
    return $suma;
}

function ispisiNiz($brojevi){
    for($i = 0; $i < count($brojevi)-1; $i++){
        echo $brojevi[$i].",";
    }
    echo $brojevi[count($brojevi)-1];
}

function ispisiNiz2($brojevi){
    echo $brojevi[0];
    for($i = 1; $i < count($brojevi)-1; $i++){
        echo "," .$brojevi[$i];
    }
}

// 1, 2, 3, 4

$A=[1,3,5,7,8];
// ispis("Suma niza " .$A. " je " . sumaNiza($A));
echo "Suma niza ";
// var_dump($A);
// print_r($A);
echo "je " .sumaNiza($A);

echo "<hr>";

include "primer4305pomocni.php";

?>