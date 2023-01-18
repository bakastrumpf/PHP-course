<?php include_once('primer5011header.inc.php') ?>

<h1>Forma za izmenu putovanja</h1>

<?php require_once("primer5008kompanija_meni.inc.php"); ?>

<?php
if (!empty($_GET['id'])) {
    echo "Menjamo putovanje ID={$_GET['id']}";

require_once("../primer5010config.inc.php");

    $upit = "SELECT * FROM akcija WHERE idponude={$_GET['id']}";

    $rezultat = mysqli_query($conn, $upit)
        or die(mysqli_error($conn));

    $broj_redova = mysqli_num_rows($rezultat);

    if ($red = mysqli_fetch_row($rezultat)) {
        // $red = mysqli_fetch_row($rezultat);

?>

<fieldset style="width: 500px">
    <form name="update_trip" id="update_trip" method="post" action="primer5014update_trip.php">
        <input type="hidden" id="id" name="id" value="<?php echo $red[0]; ?>" />
        Destinacija:
        <input type="text" id="destination" name="destination" size="32" placeholder="Unesite odredište" value="<?php echo $red[1]; ?>" />
        <br>

        Tip aranžmana:
        <!-- red[2] je tip -->
        <select name="type" id="">

        <?php
        if ($red[2] == 'aviokarta')
            echo "<option selected>aviokarta</option>";
        else
            echo "<option>aviokarta</option>";

        if ($red[2] == 'hotel')
            echo "<option selected>hotel</option>";
        else
            echo "<option>hotel</option>";

        if ($red[2] == 'brzi voz')
            echo "<option selected>brzi voz</option>";
        else
            echo "<option>brzi voz</option>";

        if ($red[2] == 'vikend aranžman')
            echo "<option selected>vikend aranžman</option>";
        else
            echo "<option>vikend aranžman</option>";

        ?>
<!--
    <option>aviokarta</option>
    <option>hotel</option>
    <option>aviokarta+hotel</option>
    <option selected>brzi voz</option>
-->
        </select>
        <br>

        Cena:
        <input type="text" name="price" id="price" size="5" value='<?php echo $red[3] ?>' />
        <br>

        Period:
        <input type="text" name="period" size="20" value='<?php echo $red[5] ?>' />
        <br>

        <input type="submit" name="submitform" value="IZMENI" />

    </form>
</fieldset>

<?php
    }  // if broj redova
}   // if ID
?>

<div>
    <?php
    if (!empty($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        $_SESSION['msg'] = "";
    }

    ?>
    
</div>