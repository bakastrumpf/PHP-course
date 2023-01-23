<?php

include_once 'primer5202automobil.php';
include_once 'primer5203tacka.php';
include_once 'primer5204duz.php';
include_once 'primer5205izlomljenalinija.php';
include_once 'primer5206poligon.php';

echo "<hr><hr><strong>Klasa, konstruktori | Automombil</strong> <br>";

// $a = 'test';
// echo 'Test jednostrukih navodnika $a';
// echo "Test dvostrukih navodnika $a";

$auto1 = new Automobil('Reno', 'crna', 'NS258CD');
// var_dump($auto1);
// $auto1->marka = 'Ferari';
// $auto1->registracija = 'BG123AB';
// $auto1->boja = 'siva';

echo "<br>";
var_dump($auto1);

$auto2 = new Automobil('Reno', 'plava');
$auto2->postaviRegistraciju("NS157FE");
$auto2->promeniBoju("zelena");

echo "<br>";
var_dump($auto2);

echo "<br>";
echo $auto2->dohvatiBoju()."<br>";
// $auto2->boja = 'bela'; 

echo "<br>";
echo $auto2;
// echo $auto2 ->__toString();

echo "<br><hr>";


echo "<strong> Klasa, konstruktori | Tačka </strong> <br>";

$tacka1 = new Tacka(1,2);
$tacka2 = new Tacka(4,6);
echo "<br>". $tacka1." ".$tacka2."<br>";
echo "<br>Rastojanje je ".$tacka1->rastojanje($tacka2) ."<br>";

// echo "<br>Rastojanje je ".$tacka1->rastojanje(5);

// promenljivama mozemo promeniti tip
// var $a = 4;
// $a = '4';    // promenili smo tip promenljive

echo "<hr><strong> Get, set | Tačka </strong> <br><br>";

// podrazumevani get / set prvo provere da li vrednost polja postoji
// dohvataju vrednost samo ako je modifikator PUBLIC
// ako je PRIVATE, možemo samo da dohvatimo vrednost ali ne i da je menjamo
echo $tacka1->x ."<br>";
echo $tacka1->y ."<br>";
// echo $tacka1->z ."<br>";
$tacka1->z= "Tekst <br>";

// get dohvata vrednost polja
// set: ako postoji polje i ako je PUBLIC, kreira ga, u suprotnom ne radi ništa

echo "<hr><strong> Duž </strong> <br><br>";

$duz = new Duz($tacka1, $tacka2);
echo "$duz ima dužinu ". ($duz->duzina());

echo "<hr><strong> Izlomljena linija </strong> <br><br>";

$tacka3 = new Tacka(7,8);
$tacka4 = new Tacka(8,1);
$tacka5 = new Tacka(3,5);
$tacka6 = new Tacka(1,3);

$izlomljenaLinija = new IzlomljenaLinija([$tacka1, $tacka2, $tacka3, $tacka4, $tacka5, $tacka6]);
echo $izlomljenaLinija ." je dužine " .$izlomljenaLinija->duzina();
// var_dump($izlomljenaLinija);

echo "<hr><strong> Izvedene klase | Poligon </strong> <br><br>";

$poligon = new Poligon(
    [$tacka1, $tacka2, $tacka3, $tacka4, $tacka5, $tacka6]);
echo "<br><br>$poligon je dužine ". $poligon->duzina();
// var_dump($poligon);

echo "<hr><hr>";

?>