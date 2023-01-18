<?php
session_start();

$destination = $_POST['destination'];
$type = $_POST['type'];
$price = $_POST['price'];
$period = $_POST['period'];
$id = $_POST['id'];

$poruka = "";
if(empty($destination) || empty($price) || empty($period))
    $poruka = "Neki podatak nedostaje!";

    if($poruka != ""){
    $_SESSION['msg'] = $poruka;
    header("Location: primer5013azuriraj.php");
    exit();
}

include_once("../primer5010config.inc.php");

$upit = "UPDATE akcija SET destinacija='$destination', tip='$type', cena='$price', period='$period' WHERE idponude=$id ";

if(mysqli_query($conn, $upit))
$_SESSION['msg'] = "Uspešno ste izmenili aranžman= $id";
else
$_SESSION['msg'] = "Greška u upitu $upit ".mysqli_error($conn);
mysqli_close($conn);
header("Location:primer5013azuriraj.php");
exit();

?>