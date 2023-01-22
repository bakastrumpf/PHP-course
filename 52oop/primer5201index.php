<?php

include_once 'primer5202automobil.php';

// $a = 'test';
// echo 'Test jednostrukih navodnika $a';
// echo "Test dvostrukih navodnika $a";

$auto1 = new Automobil('Reno', 'crna', 'NS258CD');
// var_dump($auto1);
// $auto1->marka = 'Ferari';
// $auto1->registracija = 'BG123AB';
// $auto1->boja = 'siva';
var_dump($auto1);

$auto2 = new Automobil('Reno', 'plava');
$auto2->postaviRegistraciju("NS157FE");
$auto2->promeniBoju("zelena");
var_dump($auto2);

echo $auto2->dohvatiBoju()."<br>";
// $auto2->boja = 'bela'; 

echo $auto2;
// echo $auto2 ->__toString();

include_once 'primer5203tacka.php';

$tacka1 = new Tacka(1,2);
$tacka2 = new Tacka(4,6);
echo $tacka1." ".$tacka2."<br>";
echo "<br>Rastojanje je ".$tacka1->rastojanje($tacka2);

// echo "<br>Rastojanje je ".$tacka1->rastojanje(5);

// promenljivama mozemo promeniti tip
// var $a = 4;
// $a = '4';

?>