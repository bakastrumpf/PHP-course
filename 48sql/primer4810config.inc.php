<?php
define("SERVER_NAME", "localhost:3306");
define("DB_NAME", "akcije2023");
define("DB_USER", "USERNAME");
define("DB_PASS", "PASSWORD");

$conn = mysqli_connect(SERVER_NAME, DB_USER, DB_PASS, DB_NAME)
    or die("Greska: " . mysqli_connect_error());


?>

<!-- skripta_brisanje_trip.inc.php?id=BROJ
    $_GET['id']
-->