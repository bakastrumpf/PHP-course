<!DOCTYPE html>
<html lang="sr">
<head>
<meta charset="UTF-8">
    <meta name="keywords" content="Prekvalifikacije, ETF, PHP, html5" />
    <meta name="author" content="KŽ | MS" />
    <meta name="description" content="PHP: PHP basics" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>#PHP40: obračun</title>
</head>
<body>
    
    <?php

    // var_dump($_GET);
    // die();
                
        define('PDV_OPSTA', 20);
        define('PDV_POSEBNA', 10);
        function pdv($osnovica, $stopa = PDV_OPSTA){
            if($stopa != PDV_OPSTA && $stopa != PDV_POSEBNA){
                // greška ukoliko stopa nije 10 ili 20
                die('pogresna PDV stopa' . $stopa . '%');    // exit
            }
            if($osnovica<=0){
                die('negativna vrednost');
            }
            return $osnovica * $stopa / 100;
        }

        // echo '<br> Cena = 200 rsd; PDV = ' . pdv(200) . ' rsd;<br>';

        // echo '<br> Cena = 200 rsd <br>';
        // echo 'PDV = ' . pdv(200) . ' rsd<br>';

        function pdvCena($osnovica, $stopa = PDV_OPSTA){
            return $osnovica +pdv($osnovica, $stopa);
        }

        $osnovica = $_GET['cena'];
        $stopa = $_GET['stopa'];

        echo '<br>';
        echo 'Cena = '.$osnovica.' RSD <br>';
        echo 'PDV = ' . pdv($osnovica, $stopa) . ' RSD<br>';

        echo 'Cena sa PDVom = ' . pdvCena($osnovica, $stopa) . ' rsd<br>';


       // "[php]": {
        // "editor.defaultFormatter": "bmewburn.vscode-intelephense-client"
        //  },

    ?>

</body>
</html>