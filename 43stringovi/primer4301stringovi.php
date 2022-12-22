<?php

    $recenica = "Uskoro je Nova godina.";
    $godina = 2023;
    $procenat = 60.25;

    printf("Informacija: %s <br>", $recenica);
    printf("Stiže %d. godina, a mi smo završili %.2f posto kursa<br>", $godina, $procenat);

    printf("%s<br>", strtoupper($recenica));
    printf("%s<br>", ucfirst($recenica));
    printf("%s<br>", ucwords($recenica));

    // select * from korisnik where kor_ime = 'tasha's home'
    $kor_ime = "tasha's home";
    printf("select * from korisnik where kor_ime = '%s'", addslashes($kor_ime));

    echo "<br>";

    $spisak = "banane, jabuke, višnje, mandarine";
    $spisak_array = explode(", ", $spisak);
    var_dump($spisak_array);
    echo "<br>";

    echo substr($recenica, 10, 4);
    if(strcmp(substr($recenica, 10, 4), "Nova")==0)
        echo "<br>Stringovi su isti<br>";

    if(strcasecmp(substr($recenica, 10, 4), "nova")==0)
        echo "<br>Stringovi su isti<br>";

    printf("<br>Dužina rečenice \"%s\" je %d znaka.<br>", $recenica, strlen($recenica));

    echo strstr($recenica, "Nova");
    echo "<br>";
    echo stristr($recenica, "nova");
    echo "<br>";
    echo strpos($recenica, "Nova");
    echo "<br>";

    echo str_replace("Nova", "Nova 2023.",$recenica);

    $a = 0;
    eval("$a = 2*(1+9)");
    echo $a;

    

?>