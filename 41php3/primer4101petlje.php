<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="Prekvalifikacije, ETF, PHP, html5" />
    <meta name="author" content="JC | MS" />
    <meta name="description" content="PHP: PHP basics" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP#41 | PHP basics: variables, fs, loops</title>
</head>

<body>
    <?php

    // 1. zadatak: promenljiva koja sadrži string
    // ispisati vrednost preko echo
    $ime = 'Marija';
    echo $ime;

    // declare(strict_types=1);

    // 2. zadatak: f-ja koja prima parametar i ispisuje ga
    function ispisImena($ime)
    {
        // global $ime;
        // $podatak = $ime;
        return $ime;
    }

    echo '<hr><br> Ja nisam ' . ispisImena('Vesna') . '.<br>';
    echo '<br> Ja sam ' . ispisImena($ime) . '.<br>';

    echo "<hr>";

    $a = 5;

    function ispisBroja(int $broj)
    {
        $novi_broj = $broj + 5;
        echo $novi_broj;
    }

    ispisBroja("5");
    ispisBroja($a);

    echo "<hr>";

    // 3. zadatak: f-ja koja vraća proizvod 2 broja
    // pozvati f-ju i ispisati rezultat
    function proizvod($c, $d)
    {
        return $c * $d;
    }

    echo 'proizvod = ' . proizvod(3, 4) . '<br>';

    echo "<hr>";

    $e = 10;
    $f = 5;

    $e += $f; // $e = $e + $f;

    echo ++$e;
    echo $e++;
    echo $e;

    echo "<hr>";

    $g = 5;
    $h = 10;

    $g *= $h; // 50
    ++$g;       // 51
    $i = &$g; // 51
    $g = $h;    // 10
    echo $i;

    echo "5" == 5; // jednakost uz konverziju   
    echo "5" === 5; // identičnost = jednakost bez konverzije

    echo "<hr>";

    $ocena = 5;

    // (5>7)||(3>4) // F || T = T
    // ((2>1)&&(3>5))&&((4>5)||(2>1)) // ((T)&&(F))&&((F)||(T)) = F&&T = F

    if ($ocena == 5) {

        // if($ocena<=5){
        echo "FAIL";
    } else {
        if ($ocena = 6) {
            echo "Barely pass";
        } else {
        }
        echo "PASS";
    }

    echo " | ";

    echo ($ocena > 5) ? "Polozio" : "Pao";

    echo "<hr>";

    echo gettype($ocena);

    echo "<hr>";

    // $a = 5;
    // $b = 7;

    function poredjenje($a, $b)
    {
        if ($a > $b) {
            return 'a > b';
        } else {
            if ($a < $b) {
                return 'a < b';
            } else {
                return 'a = b';
            }
        }
    }

    echo poredjenje(18, 29);

    echo "<hr>";

    switch ($ocena) {
        case '5': {
                echo '<p> Pao </p>';
                break;
            }
        case '6': {
                echo '<p> Jedva položio </p>';
                break;
            }
        case '7': {
                echo '<p> Jadno, ali dovoljno </p>';
                break;
            }
        case '8': {
                echo '<p> Solidno </p>';
                break;
            }
        case '9': {
                echo '<p> Dobar, 9! </p>';
                break;
            }
        case '10': {
                echo '<p> Svaka čast, 10! </p>';
                break;
            }
        default: {
                echo '<p> Pogrešan podatak </p>';
            }
    }

    echo "<hr>";

    $godDoba = 5;
    switch ($godDoba) {
        case '1': {
                echo '<p> Proleće </p>';
                break;
            }
        case '2': {
                echo '<p> Leto </p>';
                break;
            }
        case '3': {
                echo '<p> Jesen </p>';
                break;
            }
        case '4': {
                echo '<p> Zima </p>';
                break;
            }
        default: {
                echo '<p> Ne postoji to godišnje doba! </p>';
            }
    }

    echo "<hr>";

    // while loop
    $broj = 0;
    while ($broj < 10) {
        echo $broj . " ";
        $broj += 2;
    }

    echo "<hr>";

    $broj = 0;
    while ($broj < 10) {
        if ($broj == 8) {
            echo 'Izlazimo iz petlje kad dodjemo do 8';
        } else {
            echo $broj . " ";
        }
        $broj += 2;
    }

    echo "<hr>";

    for ($i = 0; $i < 10; $i += 2) {
        echo " " . $i . " ";
    }

    echo "<hr>";

    // zadatak: for od 1 do 10, ispisuje kvadrate brojeva
    for ($i = 1; $i < 10; $i++) {
        echo "&nbsp;" . $i * $i . "&nbsp";
        "<br>";
    }

    echo "<hr>";

    // zadatak: for od 1 do 20, ispisuje parne brojeva
    for ($i = 1; $i <= 20; $i++) {
        if ($i % 2 == 0)
            echo "&nbsp;" . $i . " ";
    }

    echo "<hr>";

    // BREAK prekida izvršavanje petlje
    for ($i = 1; $i <= 20; $i++) {
        echo "&nbsp;" . $i . " ";
        if ($i % 2 == 0) {
            break;
        }
        // echo "&nbsp;" .$i. " ";
    }

    echo "<hr>";

    // CONTINUE prelazi na sledeću iteraciju u petlji
    for ($i = 1; $i <= 20; $i++) {
        if ($i % 2 == 0) {
            continue;
        }
        echo "&nbsp;" .$i. " ";
    }

    echo "<hr>";

    // CONTINUE prelazi na sledeću iteraciju u petlji
    for ($i = 1; $i <= 20; $i++) {
        if ($i % 5 == 0) {
            continue; // kao da radimo i++
        }
        echo "&nbsp;" .$i. " ";
    }

    echo "<hr>";

    for ($i = 1; $i <= 20; $i++) {
        if ($i > 5)
        continue; 
        echo "&nbsp;" .$i. " ";
    }

    echo "<hr>";

    for ($i = 1; $i <= 20; $i++) {
        if ($i == 5)
        continue; 
        echo "&nbsp;" .$i. " ";
    }

    echo "<hr>";

    // petlja od 1 do 10 ispisuje neparne brojeve
    // kad dodje do 5, prekida
    // kad dodje do 5, nastavlja

    for ($i = 1; $i <= 10; $i++) {
        // echo "&nbsp;" . $i . " ";
        if ($i == 5) 
            // break;
            continue;
        if($i%2!=0)
            echo "&nbsp;" . $i . " ";
    }

    ?>

</body>

</html>