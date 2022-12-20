<?php

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
    <title>#PHP42: Kupovina</title>
</head>

<body>
    <form name="kupovina" method="GET" target="_blank" action="primer4202racun.php">
        <table>
            <tr>
                <th>Назив</th>
                <th>Цена</th>
                <th>Количина</th>
            </tr>


            <?php

            for ($i = 0; $i < count($proizvodi); $i++) {
                // echo "<tr><td>";
                // echo $proizvodi[$i]['ime'] . "<br>";
                // echo "</td>";

                // echo "<td>";
                // echo $proizvodi[$i]['cena'] . "<br>";
                // echo "</td>";

                echo "<tr><td>";
                echo $proizvodi[$i]['ime'];
                echo "</td><td>";
                echo $proizvodi[$i]['cena'];
                echo "</td><td>";
                echo "<input name='$i' type='number' value='0'/>";
                // greška: promenljiva se ne zameni vrednošću ako je pod duplim navodnicima
                // echo "<input name="$i" type='number' value='0'/>";
                echo "</td></tr>";
            }

            ?>

        </table>
        <input type="submit" name="Posalji" value="Пошаљи" />
    </form>
</body>

</html>