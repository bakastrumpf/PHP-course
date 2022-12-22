<?php

require_once "primer4307proveraPodataka.php";

    if(isset($_POST["posalji"])){
        if(proveraPodataka($_POST['mejl'], $_POST['lozinka'])){
            echo "Ulogovan";
            exit;
        } else {
            $poruka =  "Neispravni podaci";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="keywords" content="Prekvalifikacije, ETF, PHP, html5" />
    <meta name="author" content="TŠ | MS" />
    <meta name="description" content="PHP: PHP basics" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>#PHP43: Login</title>
</head>

<body>
    <span style="color: red;"> 
    <?= $poruka ?? "" ?>
    </span>
    <br>
    <fieldset style="width: 300px;">
    <h3>Forma za login</h3>
        <form name="login" method="POST" action="
        <?= $_SERVER['PHP_SELF']; ?>
        ">
            Mejl:
            <input type="text" name="mejl" value="<?= $_POST['mejl'] ?? "" ?>"><br>
            <br>
            Lozinka:
            <input type="text" name="lozinka"><br>
            <br>
            <input type="submit" name="posalji" value="POŠALJI"><br>
        </form>
    </fieldset>
</body>

</html>