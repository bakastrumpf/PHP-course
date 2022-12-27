<?php
session_start();
require_once("primer4503podaci.php");

// $cena = $pozoriste[$id]['cenakarte'];
// $id = $_GET['id'];

if(isset($_POST['brKarata']) && isset($_POST['idPozorista'])) {
    $idPozorista = $_POST['idPozorista'];
    $brKarata = $_POST['brKarata'];
    $cena = $pozorista[$idPozorista]['cenakarte'];
    $ukupnaCena = $brKarata * $cena;
    // $_SESSION['id'] = $idPozorista;
    // $_SESSION['brKarata'] = $brKarata;
    // $_SESSION['cena'] = $ukupnaCena;
    $_SESSION['trenutnakupovina'] = [
        'id' => $idPozorista,
        'brKarata' => $brKarata,
        'cena' => $ukupnaCena
    ];

    // header("Location: primer4502potvrda.php?id=$idPozorista&brKarata=$brKarata&cena=$ukupnaCena");
    header("Location: primer4502potvrda.php");
    exit;
}

?>

<h3>Куповина</h3>

<form action="primer4501kupovina.php" method="POST">
    <input type="hidden" name="idPozorista" value="<?= $_GET['id'] ?>">
    Број карата:
    <input type="number" name="brKarata">
    <br>
    <br>
    <button type="submit">Купи карте</button>
</form>