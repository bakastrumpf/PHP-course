<?php
    session_start();
    // var_dump($_POST);

    if(isset($_SESSION['korisnik'])){
        // login.php
        header('location: primer4401index.php');
        exit;
    }

    $korisnici = [
        "kristijan" => "123",
        "tamara" => "456"
    ];
    if(
        isset($_POST['korisnik']) && isset($_POST['lozinka'])
        ){
            $korisnik = $_POST['korisnik'];
            $lozinka = $_POST['lozinka'];

            if(!key_exists($korisnik, $korisnici)){
                $greska = 'Korisnik ne postoji.';
            } else {
                // korisnik sigurno postoji 
                if ($lozinka == $korisnici[$korisnik]){
                    // lozinka je u redu
                    $_SESSION['korisnik'] = $korisnik;
                    header('location: primer4401index.php');
                    exit;
                } else {
                    // pogrešna lozinka
                    $greska = 'Pogrešna lozinka.';
                }
            }
    if(isset($greska)){
        echo '<p style="color: red;">'.$greska.'</p>';
        }
    }

?>
<br>
<br>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>#PHP44: Login</title>
</head>

<body>

    <fieldset style="width: 400px;">
        <h3>Prijavljivanje</h3>
        <form name="login" method="POST" action="
        <?= $_SERVER['PHP_SELF']; ?>
        ">
            Korisničko ime:
            <input type="text" name="korisnik" value="<?= $_POST['mejl'] ?? "" ?>"><br>
            <br>
            Lozinka:
            <input type="text" name="lozinka"><br>
            <br>
            <!--
            <input type="submit" name="posalji" value="POŠALJI"><br>
            -->
            <button>Prijavi me</button>
        </form>
    </fieldset>

</body>

</html>