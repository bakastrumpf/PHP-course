<?php

include_once 'primer5305stavka.php';

class Faktura{
    private array $stavke;

    function __construct($stavke = [])
    {
        $this->stavke=$stavke;
    }

    function ispisiStavke(){
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>Naziv</th>";
        echo "<th>Količina</th>";
        echo "<th>Cena/kom</th>";
        echo "<th>Ukupno</th>";
        echo "</tr>";

        foreach($this->stavke as $stavka){
            echo "<tr>";
            echo "<td>".$stavka->artikal->naziv."</td>";
            echo "<td>".$stavka->kolicina."</td>";
            echo "<td>".$stavka->artikal->cena."</td>";
            echo "<td>".$stavka->cena()."</td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    public function ispisUkupno(){
        echo "<br>Ukupno: ".$this->cena()." din";
    }

    public function ispis(){
        $this->ispisiStavke();
        $this->ispisUkupno();
    }

    public function cena(){
        $cena = 0;
        foreach($this->stavke as $stavka){
            $cena += $stavka->cena();
        }
        return $cena;
    }
}

?>