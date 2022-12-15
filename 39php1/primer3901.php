<html>
    <head>
    <meta charset="UTF-8">
    <meta name="keywords" content="Prekvalifikacije, ETF, PHP, html5" />
    <meta name="author" content="MO | MS" />
    <meta name="description" content="PHP: PHP intro" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP#39 | PHP intro</title>
    </head>
    <body>
        <?php
        $b = "Promenljiva B"; 
        // $a = "<p>" .$b. "</p>";
        # $a = "<p>" .$b. "</p>";
        /*
        $a = "<p>" .$b. "</p>";
        */
        $aa = '<p>$b</p>';
        $a = "<p>$b</p>";
            echo '<h1>Evo još jednog naslova u PHPu</h1>';
            echo "<p>Tekst u okviru taga P</p>";
            for($i = 0; $i < 10; $i++){
                echo $a . ": iteracija $i";
                echo $aa. ": iteracija $i";
            }
            
        ?>
        <h2>Ovo je prva stranica u PHP!</h2>
    </body>
    <?php 
        echo "<h3>Podnaslov u PHP </h3>";

    ?>
        // zadatak: kroz php ispisati naslove od h1 do h6
        /* Napraviti u PHP tag-u da se ispisuje u h1 tagu Naslov 1, u h2 tagu Naslov 2, i sve tako do h6 taga sa Naslovom 6 */
        /* Smernica 1: ne raditi ovo sa 6 iskaza echo gde se samo rucno menja string vrednost svakog od njih! */
        /* Smernica 2: koristiti petlju FOR i vrednost trenutne iteracije za ispis taga i naslova */

    <?php
    
    for($j = 0; $j < 7; $j++){
        if($j%2 ==0){
            echo "<h$j>Naslov h$j</h$j>";
        } else {
            echo "<p>Paragraf $j</p>";
        }
        // ili samo: echo "<h$j>Naslov h$j</h$j>" : bez provere u IF
        // echo "<h>" .$i. "Naslov " .$i. "</h>" .$i. ">";       
    }
    ?>

</html>