<?php
include_once('primer5111header.inc.php')
?>

<h1>Forma za unos nove akcije</h1>

<script>
    function myFocusFunct() {
        document.getElementById("price").style.backgroundColor = 'yellow';
    }

    function myFocusFunct2() {
        document.getElementById("price").style.backgroundColor = 'yellow';
    }

    function provera() {
        alert("Provera");
        uzorak_dest = /[A-Z][a-z]{2,}/;
        uzorak_price = /\d+\.?\d*/;

        if (uzorak_dest.test(document.insert_trip.destination.value)) {

            if (uzorak_price.test(document.insert_trip.price.value)) {
                alert("Uspešno");
                // korak slanja forme na server
                document.forms['insert_trip'].submit();
            } else {
                // var price = document.getElementById("price");
                price.addEventListener("focus", myFocusFunct, true);
            }
        } else {
            price.addEventListener("focus", myFocusFunct2, true);
        }
    }
</script>

<?php
require_once("primer5108kompanija_meni.inc.php");
?>

<fieldset>
    <form name="insert_trip" id="insert_trip" method="post" action="primer5109insert_trip.php">

        Destinacija:
        <input type="text" id="destination" name="destination" size="32" placeholder="Unesite odredište" />
        <br>

        Tip aranžmana:
        <select name="type" id="">
            <option>aviokarta</option>
            <option>hotel</option>
            <option>aviokarta+hotel</option>
            <option>brzi voz</option>
        </select>
        <br>

        Cena:
        <input type="text" name="price" id="price" size="5" />
        <br>

        Period:
        <input type="text" name="period" size="20" />
        <br>

        <input type="submit" name="submitform" value="UNESI" onClick="provera()" />

    </form>
</fieldset>

<?php
if (!empty($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    $_SESSION['msg'] = "";
}

?>