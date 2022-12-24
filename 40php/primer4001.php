<!DOCTYPE html>
<html lang="sr">
<head>
<meta charset="UTF-8">
    <meta name="keywords" content="Prekvalifikacije, ETF, PHP, html5" />
    <meta name="author" content="KŽ | MS" />
    <meta name="description" content="PHP: PHP basics" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP#40 | PHP basics</title>
</head>
<body>
    Hello, world!

    <?php
        echo 'abc';
        echo '<h2>Naslov h2</h2>';

        define('SABAC', 15000);
        echo SABAC;
        
        define('PDV_OPSTA', 20);
        define('PDV_POSEBNA', 10);
        function pdv($osnovica, $stopa = PDV_OPSTA){
            if($stopa != PDV_OPSTA && $stopa != PDV_POSEBNA){
                // greška ukoliko stopa nije 10 ili 20
                die('pogresna PDV stopa');
                // exit
            }
            return $osnovica * $stopa / 100;
        }

        echo '<br> Cena = 200 rsd; PDV = ' . pdv(200) . ' rsd;<br>';

        echo '<br> Cena = 200 rsd <br>';
        echo 'PDV = ' . pdv(200) . ' rsd<br>';

        function pdvCena($osnovica, $stopa = PDV_OPSTA){
            return $osnovica +pdv($osnovica, $stopa);
        }

        echo 'Cena sa PDVom = ' . pdvCena(200, 20) . ' rsd<br>';
        echo 'Cena sa PDVom = ' . pdvCena(200, 7) . ' rsd<br>';
        

        $boja = 'red';
        $velicina = 24;

    ?>

    <h3>Naslov h3</h3>

    <?php echo $velicina; ?>
    <h<?php echo $velicina; ?>>Naslov h3</h<?php echo $velicina; ?>>

    <?php
        echo SABAC . '5';
    ?>

    <br>
    <h<?php echo $velicina; ?>>Novi naslov</h<?php echo $velicina; ?>>
    <br>

    <span style="font-size:<?php echo $velicina ?>px">
        Naslov u spanu
    </span>

    <br>
    <span style="color:<?php echo $boja ?>">
        Obojeni naslov u spanu
    </span>

</body>
</html>