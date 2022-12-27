Информације
<br>

<?php

// var_dump($_COOKIE);
// postavljanje kolačića:
// setcookie("kolacic", "12345");
// echo $_COOKIE["kolacic"];

$id = $_GET['id'];

require_once("primer4503podaci.php");
?>

<img src="pozorista/<?= $id ?>.png" style="width: 50px" />
<h3><?= $pozorista[$id]['ime'] ?></h3>
<br>
<a href="primer4501kupovina.php?id=<?= $id ?>">КУПИ КАРТЕ</a>