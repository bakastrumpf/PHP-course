<?php
include_once 'primer5304artikal.php';
include_once 'primer5305stavka.php';
include_once 'primer5306faktura.php';
include_once 'primer5307fakturaPDV.php';

echo "<hr><hr><strong>Artikli</strong> <br><br>";
$kafa1 = new Artikal('kafa', 299.99);
$cokolada1 = new Artikal('čokolada', 149.99);
$caj1 = new Artikal('čaj', 120);
$voda1 = new Artikal('voda', 70);
$artikli = [$kafa1, $cokolada1, $caj1, $voda1];

echo $artikli;
echo "<br>";

echo "Artikli: <br>";
foreach($artikli as $artikal){
    echo $artikal;
    echo "<br>";
}

// echo "<br>";
// echo $kafa1;
// echo "<br>";
// echo $cokolada1;
// echo "<br>";
// echo $caj1;
// echo "<br>";
// echo $voda1;

echo "<hr><hr><strong>Stavke</strong> <br><br>";

$stavka1 = new Stavka($voda1, 3);
$stavka2 = new Stavka($kafa1, 1);
$stavka3 = new Stavka($cokolada1, 4);
$stavke = [$stavka1, $stavka2, $stavka3];
// echo $stavke;

echo "Stavke: ";
foreach($stavke as $stavka){
    echo $stavka;
}

echo "<hr><hr><strong>Faktura</strong> <br><br>";

$faktura1 = new Faktura($stavke);
$faktura1->ispis();

$fakturaSaPDV= new FakturaPDV($stavke);
$fakturaSaPDV->ispis();


?>