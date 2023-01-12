<?php
session_start();
if(empty($_SESSION['user_type'])){
    header("Location:primer4801index.php");
    exit();
}
if($_SESSION['user_type'] == 2){
    header("Location:primer4804komp.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="keywords" content="Prekvalifikacije, ETF, PHP, html5">
    <meta name="author" content="DD | MS">
    <meta name="description" content="PHP: PHP & MySQL">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akcije: korisnik</title>
</head>
<body>
    Korisnik <?= $_SESSION['user'] ?> 
    <div style="float:right">
        <a href="primer4805logout.php">Odjava</a>
    </div>
</body>
</html>