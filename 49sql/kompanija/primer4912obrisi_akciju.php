<?php
session_start();
if(!empty($_GET['id']) && !empty($_GET['mesto'])){
    echo "Želim da obrišem ID= ".$_GET['id'];
    echo "<br/> Destinacija: " .$_GET['mesto'];

    // konekcija na bazu
    include_once("../primer4910config.inc.php");

    // pisanje upita
    $upit = "delete from akcija where idponude={$_GET['id']}";

        if(mysqli_query($conn, $upit)){
            $_SESSION['msg'] = "Uspešno ste obrisali destinaciju ID={$_GET['id']}";
        } else {
            $_SESSION['msg'] = "Greška: " .$upit. " " . mysqli_error($conn);
        }

    // zatvaranje konekcije i preuseravanje
    mysqli_close($conn);
    header("Location: primer4911komp_obrisi_akciju.php");

} else {
    header("Location: primer4904komp.php");
}

?>