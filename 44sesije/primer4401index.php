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

$pozorista = [
    1 => "Позориште на Теразијама",
    2 => "Југословенско драмско позориште",
    3 => "Београдско драмско позориште",
    4 => "Звездара театар",
    5 => "Народно позориште",
    6 => "Атеље 212",
    7 => "Позориште Славија",
    8 => "Мадленианум",
    9 => "Театар Вук",
    10 => "Театар на Брду",
    11 => "Позориште Бошко Буха",
    12 => "КПГТ",
    13 => "Академија 28",
    14 => "Битеф Театар"
];

//foreach($pozorista as $key => $value){
//    echo $key .' - ' .$value. '<br>';
// }

foreach ($pozorista as $key => $value) : ?>
    <a href="primer4404pozoriste.php?id=<?= $key ?>">
        <img src="pozorista/<?= $key ?>.png" style="width: 50px" />
    </a>
<?php
endforeach;
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