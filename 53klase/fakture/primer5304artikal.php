<?php
// cena i naziv
// konstruktor, __get, __toString( Kafa [120din] )

class Artikal{
    private string $naziv;
    private float $cena;

    public function __construct($naziv, $cena){
        $this->naziv=$naziv;
        $this->cena=$cena;
    }

    public function __get(string $name)
    {
        // echo "<br>Pristup polju: ".$name."<br>";
        return $this->$name;
    }

    public function __toString()
    {
        return "{$this->naziv} [{$this->cena} din]";
    }

}

?>