<?php
session_start();
if (empty($_SESSION['user_type'])) {
    header("Location:primer4701index.php");
    exit();
}
if ($_SESSION['user_type'] == 1) {
    header("Location:primer4703korisnik.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="Prekvalifikacije, ETF, PHP, html5">
    <meta name="author" content="TŠ | MS">
    <meta name="description" content="PHP: PHP & MySQL">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akcije: kompanija</title>
</head>

<body>
    Kompanija <?= $_SESSION['user'] ?>
    <div style="float:right">
        <a href="primer4705logout.php">Odjava</a>
    </div>
    <table>
        <tr>
            <th>Destinacija</th>
            <th>Tip</th>
            <th>Cena</th>
            <th>Period</th>
        </tr>
        <?php
        include_once 'primer4706akcije.php';
        while ($red = mysqli_fetch_array($akcije)) {
            echo "<tr><td>{$red['destinacija']}</td>";
            echo "<td>{$red['tip']}</td>";
            echo "<td>{$red['cena']}</td>";
            echo "<td>{$red['period']}</td></tr>";
        }
        ?>
    </table>
</body>

</html>