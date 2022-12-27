<?php
session_start();

require_once("primer4503podaci.php");

$id = $_SESSION['trenutnakupovina']['id'];
$pozoriste = $pozorista[$id]['ime'];
// var_dump($_SESSION['trenutnakupovina']);
?>

<h3>Потврда куповине</h3>
<!-- <p>Broj karata: <?= $_SESSION['brKarata'] ?></p>
<p>Pozorište: <?= $pozoriste ?></p>
<p>Ukupna cena: <?= $_SESSION['cena'] ?></p> -->

<!-- <p>Broj karata: </p>
<p>Pozorište: </p>
<p>Ukupna cena: </p> -->

<p>Број карата: <?= $_SESSION['trenutnakupovina']['brKarata'] ?></p>
<p>Позориште: <?= $pozoriste ?></p>
<p>Укупна цена: <?= $_SESSION['trenutnakupovina']['cena'] ?></p>

<form action="primer4504potvrdaKupovine.php" method="POST">

    <button type="submit">ПОТВРДИ КУПОВИНУ</button>
</form>