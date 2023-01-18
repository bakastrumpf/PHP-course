<?php
session_start();
if (empty($_SESSION['user_type'])) {
    header("Location:primer5001index.php");
    exit();
}
if ($_SESSION['user_type'] == 2) {
    header("Location:primer5004komp.php");
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
    <title>Akcije: korisnik</title>
</head>

<body>
    Dobrodošli, <?= $_SESSION['osoba'] ?>
    <br>
    Vaša imejl adresa: <?= $_SESSION['eposta'] ?>
    <br>
    <div style="float:right">
        <a href="primer5005logout.php">Odjava</a>
    </div>
    <div>
        <fieldset style="width: 350px;">
            <h3>Gde želite da putujete?</h3>
            <hr>
            <form name="pretraga" id="pretraga" method="GET" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                Destinacija:
                <input type="text" name="dest" size="20" placeholder="Unesite željenu destinaciju" value="<?php if (isset($_GET['dest'])) echo $_GET['dest']; ?>" />
                Redosled sortiranja:
                <select name="redosled">
                    <option>opadajuci</option>
                    <option>rastuci</option>
                    <option selected>svejedno</option>
                </select>
                <br>
                <hr>
                Tip:
                <br> <input type="radio" name="tip" value="0" checked>svi
                <br> <input type="radio" name="tip" value="1" <?php if (isset($_GET['tip']) && $_GET['tip'] == 1) echo 'checked'; ?>>aviokarta
                <br> <input type="radio" name="tip" value="2" <?php if (isset($_GET['tip']) && $_GET['tip'] == 2) echo 'checked'; ?>>brzi voz
                <br> <input type="radio" name="tip" value="3" <?php if (isset($_GET['tip']) && $_GET['tip'] == 3) echo 'checked'; ?>>hotel 3* + avio
                <br> <input type="radio" name="tip" value="4" <?php if (isset($_GET['tip']) && $_GET['tip'] == 4) echo 'checked'; ?>>hotel 4* + avio
                <br> <hr>
                <input type="checkbox" name="poceni"> Filter po ceni:
                <br>
                Cena od: <input type="number" name="cenaod" value="0"> 
                <br>
                Cena do: <input type="number" name="cenado">
                <hr>
                <input type="submit" name="potvrda" value="PRETRAŽI">
            </form>
        </fieldset>
    </div>
    <div>
        <?php
        if (isset($_GET['potvrda'])) {
            echo "<br> Rezultati: <br>";

            // kriterijumi pretrage
            $destinacija = $_GET['dest'];
            $tip = $_GET['tip'];
            $redosled = $_GET['redosled'];
            
            // if(isset($_GET['poceni']))
            // echo "Filtriranje po ceni: " .$_GET['poceni'];

            // ukljucujemo bazu
            include_once('primer5010config.inc.php');

            // pisanje upita 
            $upit = "SELECT * FROM akcija a, kompanija k WHERE a.userkomp=k.userkomp";     // bez naziva destinacije i SVI tipovi

            if ($destinacija != "") {
                // $upit .= " WHERE destinacija='$destinacija'";    // pretraga po celom nazivu
                // ako je uneta destinacija, nadovezujemo se na prethodni upit

                $upit .= " AND destinacija LIKE '%$destinacija%'";    // pretraga po delu naziva
                if ($tip != 0) {
                    if ($tip == 1) $upit .= " AND tip='aviokarta'";
                    if ($tip == 2) $upit .= " AND tip='brzi voz'";
                    if ($tip == 3) $upit .= " AND tip='hotel 3* + avio'";
                    if ($tip == 4) $upit .= " AND tip='hotel 4* + avio'";
                }   // ne treba nam else jer smo pokrili sve slučejeve
            } elseif ($tip != 0) {
                if ($tip == 1) $upit .= " AND tip='aviokarta'";
                if ($tip == 2) $upit .= " AND tip='brzi voz'";
                if ($tip == 3) $upit .= " AND tip='hotel 3* + avio'";
                if ($tip == 4) $upit .= " AND tip='hotel 4* + avio'";
            }

            // samo sortiranje rezultata po abecedi
            if ($redosled == 'rastuci')
                $upit .=" ORDER BY destinacija ASC";
            elseif ($_GET['redosled'] == 'opadajuci') {
                $upit .=" ORDER BY destinacija DESC";
            }

            // ako je ukljucen checkbox (vrednost ON)
            // dodajemo filriranje po ceni
            if(isset($_GET['poceni']))
            $upit .= " AND (a.cena BETWEEN {$_GET['cenaod']} AND {$_GET['cenado']})";

            $rezultat = mysqli_query($conn, $upit)
                or die("Greška: " . mysqli_error($conn));

            if (mysqli_num_rows($rezultat) > 0) {
                echo "<table border='5'>";
                echo "<tr>";
                echo "<th>Destinacija</th>";
                echo "<th>Tip aranžmana</th>";
                echo "<th>Cena</th>";
                echo "<th>Period</th>";
                echo "<th>Kompanija</th>";
                echo "<th>Kupi</th>";
                echo "<tr>";

                while ($red = mysqli_fetch_array($rezultat)) {
                    echo "<tr>";
                    echo "<td>{$red['destinacija']}</td>";
                    echo "<td>{$red['tip']}</td>";
                    echo "<td>{$red['cena']}</td>";
                    echo "<td>{$red['period']}</td>";
                    echo "<td>{$red['naziv']}</td>";
                    echo "<td><a href='[[[[[primer5015kor_kupi.php]]]]]?id=".$red['idponude']."'>Kupi</a></td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<br> Nema rezultata. <br> Ponovite pretragu s drugačijim podacima.";
            }
            mysqli_free_result($rezultat);
            mysqli_close($conn);
        }
        ?>
    </div>
</body>

</html>