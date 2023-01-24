<?php
include_once 'primer5304artikal.php';

// artikal, kolicina
// konstruktor, get, toString (5x kafa[150]), getCena

class Stavka {
    private Artikal $artikal;
    private int $kolicina;

    public function __construct($artikal, $kolicina){
        $this->artikal=$artikal;
        $this->kolicina=$kolicina;
    }

    public function __get(string $name)
    {
        // echo "<br>Pristup polju: ".$name."<br>";
        return $this->$name;
    }

    public function __toString()
    {
        return "<br>{$this->kolicina} x {$this->artikal} ";
    }

    public function cena(): float
    {
        return $this->kolicina * $this->artikal->cena;
    }

}

?>