<?php
session_start();
if(!empty($_GET['id']) && !empty($_GET['mesto'])){
    echo "Želim da obrišem ID= ".$_GET['id'];
    echo "<br/> Destinacija: " .$_GET['mesto'];

    // 1 konekcija na bazu
    include_once("../primer5010config.inc.php");

    // 2 pisanje upita
    $upit = "delete from akcija where idponude={$_GET['id']}";

    // 3 ispis poruke
    if(mysqli_query($conn, $upit)){
        $_SESSION['msg'] = "Uspešno ste obrisali destinaciju ID={$_GET['id']}";
    } else {
        $_SESSION['msg'] = "Greška: " .$upit. " " . mysqli_error($conn);
    }

    // 4 zatvaranje konekcije i preusmeravanje
    mysqli_close($conn);
    header("Location: primer5011komp_obrisi_akciju.php");

} else {
    header("Location: primer5004komp.php");
}

?>