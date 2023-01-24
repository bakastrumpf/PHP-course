<?php
include_once 'primer5309polje.php';
include_once 'primer5308figure.php';

$a1 = new Polje("a", 1);
$a2 = new Polje("a", 2);
$a3 = new Polje("a", 3);
$a4 = new Polje("a", 4);

$b1 = new Polje("b", 1);
$b2 = new Polje("b", 2);
$b3 = new Polje("b", 3);
$b4 = new Polje("b", 4);

$topB = new Top('beli', $a1);
$topB->iscrtaj();

$lovacC = new Lovac('crni', $b1);
$lovacC->iscrtaj();



echo $top;
?>