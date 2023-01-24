<?php
include_once 'primer5302zivotinja.php';

echo "<hr><hr><strong>Životinja</strong> <br><br>";
$zivotinja1 = new Zivotinja('lav', 'strašan');
$macka1 = new Zivotinja('Mica', 'bela');

var_dump($zivotinja1);

echo "<br>";
echo $zivotinja1;
echo "<br>";
echo $macka1;
echo "<br>";

$macka1->ime = "Ljubica";
echo $macka1->ime;
echo $macka1;


/*
new => construct
$ob->polje => __get
$ob->polje = $vr => set
$obj -> string => __toString
*/
echo "<hr>";
echo "<strong>Pas</strong> <br><br>";
$pas1 = new Pas("Boni", "žuta");
echo $pas1->ime;
echo $pas1->vrsta();
echo $pas1;
echo "<hr>";

echo "<strong>Mačka</strong> <br><br>";
$macka2 = new Macka("Elena", "crna");
echo $macka2;
echo $macka2->__toString();

echo "<br>";

$macka3 = new Macka("Indi", "šarena");
echo $macka3->ime;
echo $macka3->vrsta();
echo $macka3->__toString();

echo "<hr>";

echo "<strong>Persijska mačka</strong> <br><br>";
$macka4 = new PersijskaMacka("Sendi", "siva");
echo $macka4;
echo $macka4->vrsta();


echo "<hr>";



?>
