<?php

class IzlomljenaLinija{ 
    protected array $tacke;

    // konstruktor
    public function __construct(array $tacke)
    {
        $this->tacke = $tacke;
    }

    // __toString
    public function __toString(): string
    {
        // $text = "Izlomljena linija:  ";
        // foreach($this->tacke as $tacka){
        //     $text .= $tacka.",";
        // }
        // return $text;
        return "Izlomljena linija: ". implode("-", $this->tacke);
    }

    // vraca duzinu
    public function duzina() {
        $duzina = 0;
        for($i = 1; $i < count($this->tacke); $i++){
            $duzina += $this->tacke[$i]->rastojanje($this->tacke[$i-1]);
        }
        return $duzina;
        
    }
}

?>