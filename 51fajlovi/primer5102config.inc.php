<?php

define('DBHOST', 'localhost:3306');
define('DBUSER', 'USERNAME');
define('DBPASS', 'PASSWORD');
define('DBNAME', 'INFO');

// PROCEDURALNI PRISTUP:
// $conn = mysqli_connect(SERVER_NAME, DB_USER, DB_PASS, DB_NAME)
//     or die("Greska: " . mysqli_connect_error());

// OOP
$conn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);

// provera konekcije
if($conn -> connect_error){
    die('Konekcija nije ostvarena: ' .$conn-> connect_error);
}

?>