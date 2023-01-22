<?php
session_start();
?>

<fieldset>

<h2>Слање вести</h2><hr><br>

<form name="mojaforma" method="POST" action="primer5103posalji.php" enctype="multipart/form-data">

Наслов вести: <input type="text" name="naslov" size="20" placeholder="Наслов вести"><br><br>

Садржај вести: 
<textarea name="sadrzaj" rows="5" cols="40" placeholder="Унесите садржај вести">

</textarea><br><br>

Изаберите слику: <input type="file" name="mojfajl"><br><br>

Приоритет:
<select name="prioritet">    <?php
    // sa indeksom od 0 i inkrementom kod svake stavke Option
    // for($i=0; $i<10; ){
    //     echo "<option value=$i".++$i.">Приоритет $i </option>";
    // }
    
    for($i=1; $i<=10; $i++){
        echo "<option value=$i>Приоритет $i </option>";
    }
    ?>
</select><br><br>

Извор:
<input type="text" name="link" size="20" value="http://"><br><br><hr><br>
<input type="submit" name="potvrdi" value="ПОШАЉИ">

</form>
<?php
if(isset($_SESSION['poruka']))
    echo $_SESSION['poruka'];
    $_SESSION['poruka'] = "";
?>
</fieldset>