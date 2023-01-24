<?php
session_start();
if (empty($_SESSION['user_type'])) {
    header("Location:../primer5001index.php");
    exit();
}
if ($_SESSION['user_type'] == 1) {
    header("Location:../primer5003korisnik.php");
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
    <title>Akcije: kompanija</title>
</head>

<body>
    <!-- ubacujemo Meni za kompaniju -->

    <?php
    //  include_once generates warning, require_once generates fatal error when file is missing
    require_once('primer5008kompanija_meni.inc.php');
    ?>


    <div>
        <table border="1">
            <tr>
                <th>Destinacija</th>
                <th>Tip</th>
                <th>Cena</th>
                <th>Period</th>
            </tr>

            <?php
            include_once 'primer5006akcije.php';
            while ($red = mysqli_fetch_array($akcije)) {
                echo "<tr><td>{$red['destinacija']}</td>";
                echo "<td>{$red['tip']}</td>";
                echo "<td>{$red['cena']}</td>";
                echo "<td>{$red['period']}</td></tr>";
            }
            ?>

        </table>
    </div>

</body>

</html>