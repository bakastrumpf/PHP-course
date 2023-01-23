<?php

include_once 'primer5205izlomljenalinija.php';

class Poligon extends IzlomljenaLinija{
    //konstruktor
    function __construct(array $tacke)
    {
        parent::__construct($tacke);
    }

    // toString
    function __toString(): string
    {
        var_dump($this);
        return "Poligon: ". implode("*", $this->tacke);
    }

    // duzina
    function duzina(): float {
        $duzina = parent::duzina();
        $duzina += $this->tacke[count($this->tacke)-1]->rastojanje($this->tacke[0]);
        return $duzina;
    }
}

?>