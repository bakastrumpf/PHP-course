<?php

echo "Zdravo";
session_start();
if(!isset($_SESSION['kupovine'])){
    $_SESSION['kupovine'] = [];
}
array_push($_SESSION['kupovine'], $_SESSION['trenutnakupovina']);
echo "Nova proba";
unset($_SESSION['trenutnakupovina']);
header("Location: primer4401index.php");


?>
