<?php
session_start();
$destination = $_POST['destination'];
$type = $_POST['type'];
$price = floatval($_POST['price']);
$period = $_POST['period'];
$insertdate = date("Y-m-d");
$autorskakomp = $_SESSION['user'];  // iscitavamo podatak iz promenljive USER

$msg = "";
if(empty($destination))
    $msg .= "Destinacija nije uneta.";
if(empty($period))
    $msg .= "Period putovanja nije odabran";

if($msg != ""){
    $_SESSION['msg'] = $msg;
    header("Location:primer4807komp_unos_akcije.php");
    exit();
}

include_once("../primer4810config.inc.php");    // ucitavamo $conn iz eksternog fajla

$upit = "insert into akcija(destinacija, tip, cena, danprodaje, period, userkomp) ". 
"values('$destination', '$type', $price, '$insertdate', '$period', '$autorskakomp')";

if(mysqli_query($conn, $upit)){
    $_SESSION['msg'] = "Uspešno ste uneli putovanje: '$destination', $price";
} else {
    $_SESSION['msg'] = "Greška: " .$upit. " Br. greške: " .mysqli_error($conn);
}
mysqli_close($conn);

header("Location: primer4807komp_unos_akcije.php");
exit();

?>