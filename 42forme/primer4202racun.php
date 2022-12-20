<?php

if(empty($_GET["naruci"])){
    header(("location: primer4201kupovina.php"));
    return;
}

$proizvodi =
    // 12345
    [
        [
            // sifra:
            'ime' => 'банане',
            'cena' => 150
        ],
        [
            'ime' => 'поморанџе',
            'cena' => 130
        ],

        [
            'ime' => 'јабуке',
            'cena' => 100
        ],
        [
            'ime' => 'мандарине',
            'cena' => 160
        ]
    ];

// echo $proizvodi[0]['ime'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="Prekvalifikacije, ETF, PHP, html5" />
    <meta name="author" content="TŠ | MS" />
    <meta name="description" content="PHP: PHP basics" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>#PHP42: Račun</title>
</head>

<body>
    
</body>
    
    Поручили сте:<br><br>

    <?php

    $ukupno = 0;
    for ($i = 0; $i < count($proizvodi); $i++) {
        if($_GET[$i] > 0){
            echo $proizvodi[$i]["ime"].", ";
            echo $_GET[$i]."кг: ";
            echo $proizvodi[$i]["cena"]*$_GET[$i];
            $ukupno += $proizvodi[$i]["cena"]*$_GET[$i];
            echo "<br>";
        }
    }

    if($ukupno >0){
        echo "<br>Укупно: $ukupno<br>";
        $porez = $ukupno*0.2;
        echo "Порез: $porez";
    } else {
        echo "Ништа није поручено.";
    }

    ?>

</html>

<!-- ?php
    var_dump($_GET);
    var_dump($_POST);
    var_dump($_REQUEST);
?> -->