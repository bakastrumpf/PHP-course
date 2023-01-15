<?php
session_start();
include_once('primer4911header.inc.php')
?>

<h2>Brisanje aranžmana</h2>

<?php
include_once('primer4908kompanija_meni.inc.php');
?>

<div>
    <table border="1">
        <tr>
            <th> ID </th>
            <th> Odredište </th>
            <th> Tip </th>
            <th> Cena </th>
            <th> Period </th>
            <th> OBRIŠI </th>
            <th> IZMENI </th>
        </tr>

        <?php
        include_once 'primer4906akcije.php';
        while ($red = mysqli_fetch_array($akcije)) {
            echo "<tr>";
            echo "<td>{$red['idponude']}</td>";
            echo "<td>{$red['destinacija']}</td>";
            echo "<td>{$red['tip']}</td>";
            echo "<td>{$red['cena']}</td>";
            echo "<td>{$red['period']}</td>";
            echo "<td><a href='primer4912obrisi_akciju.php?id=" . $red['idponude'] . "&mesto=" . $red['destinacija'] . " '> X </a> </td>";
            echo "<td><a href='primer4913azuriraj.php?id=" . $red['idponude'] . "'><img src='index.png'/> </a></td>";
            echo "</tr>";
        }
        ?>

    </table>
</div>

<div>
    <?php
    if (!empty($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        $_SESSION['msg'] = "";
    }
    ?>
</div>