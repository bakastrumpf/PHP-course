<?php
session_start();

if(!empty($_SESSION['user_type'])){
    if($_SESSION['user_type'] == 1){
        header("Location:primer4703korisnik.php");
        exit();
    } else {
        header("Location:primer4704komp.php");
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="sr">

<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="Prekvalifikacije, ETF, PHP, html5">
    <meta name="author" content="TŠ | MS">
    <meta name="description" content="PHP: PHP & MySQL">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akcije: login | PHP i MySQL</title>
</head>

<body>
    <?php
    if (!empty($_SESSION['msg']))
        echo "<span style='color:red'>" . $_SESSION['msg'] . "</span>";
    ?>
    <fieldset style="width: 250px;">
        <form name="login" method="post" action="primer4702login.php">
            Korisničko ime:
            <input type="text" name="username" value="<?= $_SESSION['user'] ?? "" ?>">
            <br>
            Lozinka:
            <input type="password" name="password">
            <br>
            <select name="user_type">
                <option value="">Izaberi tip naloga</option>
                <option value="1">Korisnik</option>
                <option value="2">Kompanija</option>
            </select>
            <br>
            <input type="submit" name="login" value="Prijava">

        </form>
    </fieldset>

</body>

</html>

<?php
session_destroy();
?>