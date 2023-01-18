Podaci o prijavljenoj kompaniji:
<br>
Username: <?= $_SESSION['user'] ?> <br>
Naziv: <?= $_SESSION['naziv'] ?> <br>
Adresa: <?= $_SESSION['adresa'] ?> <br>
<br>

<div style="float:right">
    <a href="../primer5005logout.php">Odjava</a>
</div>

<div>
    <table border="1">
        <tr>
            <td><a href="primer5004komp.php">Početna</a></td>
            <td><a href="primer5007komp_unos_akcije.php">Unos akcije</a></td>
            <td><a href="primer5011komp_obrisi_akciju.php"> Brisanje akcije</a></td>
        </tr>
    </table>
</div>