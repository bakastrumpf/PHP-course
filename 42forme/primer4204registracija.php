<!DOCTYPE html>

<?php
$gradovi = [
    '11000' => 'Београд',
    '21000' => 'Нови Сад',
    '14000' => 'Ваљево',
    '18000' => 'Ниш',
    '24000' => 'Суботица',
    '34000' => 'Крагујевац'
];

$godine = [
    '1' => '1990',
    '2' => '1991',
    '3' => '1992',
    '4' => '1993',
    '5' => '1994',
    '6' => '1995'
];

define('MESECI', 
[
'јануар', 
'фебруар', 
'март', 
'април', 
'мај', 
'јун', 
'јул',  
'август', 
'септембар', 
'октобар', 
'новембар', 
'децембар'
]
);

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="Prekvalifikacije, ETF, PHP, html5" />
    <meta name="author" content="TŠ | MS" />
    <meta name="description" content="PHP: PHP basics" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>#PHP42: Registracija</title>
</head>

<body>

    <fieldset style="width: 300px;">
        <form name="registracija" method="POST" action="primer4205registracija.php">
            Име:
            <input type="text" name="ime" required>
            <br>
            Презиме:
            <input type="text" name="prezime" required>
            <br>
            Мејл:
            <input type="email" name="mejl" required>
            <br>
            Лозинка:
            <input type="text" name="lozinka" required>
            <br>
            Град:
            <select name="grad">
                <!-- <option value="bg">Београд</option>
                <option value="ns">Нови Сад</option>
                <option value="sa">Шабац</option>
                <option value="ams">Амстердам</option>
                <option value="brs">Брисел</option> -->
                <?php
                    foreach($gradovi as $postBr => $naziv){
                        echo "<option value='$postBr'>$naziv</option>";
                    }

                    /*
                    foreach($nizDrugaciji as $key => $value){
                    echo $key."-->".$value."<br>";
                    */
                ?>
            </select>
            <br>
            Годиште:
            <select name="godiste">
                <!-- <option value="1">1990</option>
                <option value="2">1991</option>
                <option value="3">1992</option>
                <option value="4">1993</option>
                <option value="5">1994</option> -->
                <?php
                    for($i = 1950; $i<2022; $i++){
                        echo "<option value='$i'>$i</option>";
                    }
                ?>
            </select>
            <br>
            Месец:
            <select name="mesec">
                <!-- <option value="1">јануар</option>
                <option value="2">фебруар</option>
                <option value="3">март</option>
                <option value="4">април</option>
                <option value="5">мај</option>
                <option value="6">јун</option>
                <option value="7">јул</option>
                <option value="8">август</option>
                <option value="9">септембар</option>
                <option value="10">октобар</option>
                <option value="11">новембар</option>
                <option value="10">децембар</option> -->
                <?php
                    foreach(MESECI as $mesec){
                        echo "<option value='$mesec'>$mesec</option>";
                    }

                    /*
                    foreach($nizDrugaciji as $key => $value){
                    echo $key."-->".$value."<br>";
                    */
                ?>
            </select>
            <br>
            <!-- Датум:
            <input type="date" name="datum">
            <br> -->
            <input type="submit" name="posalji" value="Пошаљи">
        </form>
        
    </fieldset>

</body>

</html>