<?php
session_start();
// $_SESSION['korisnik'] = 'kristijan';
// var_dump($_SESSION);

if (!isset($_SESSION['korisnik'])) {
    // login.php
    header('location: primer4402login.php');
    exit;
}

?>

<br>

DOBRODOŠLI, <?= $_SESSION['korisnik'] ?>!
<br>
<a href="primer4403logout.php">Odjavi se</a>
<br>
<br>


<?php

require_once("primer4503podaci.php");

//foreach($pozorista as $key => $value){
//    echo $key .' - ' .$value. '<br>';
// }

foreach ($pozorista as $key => $value) : ?>
    <a href="primer4404pozoriste.php?id=<?= $key ?>">
        <img src="pozorista/<?= $key ?>.png" style="width: 50px" />
    </a>
<?php
endforeach;

if(isset($_SESSION['kupovine'])){
foreach ($_SESSION['kupovine'] as $kupovina) : ?>
    <p>Име позоришта: <?= $pozorista[$kupovina['id']]['ime'] ?></p>
    <p>Укупна цена: <?= $kupovina['cena'] ?></p>
    <p>Број карата: <?= $kupovina['brKarata'] ?></p>
<?php
endforeach;
}
?>


<!-- 
    <img src="pozorista/1.png">
    <br>
    <?= $pozorista[1] ?>
    <br>
    <img src="pozorista/5.png">
    <br>
    <?= $pozorista[5] ?> 
-->