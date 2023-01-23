<?php

include_once 'primer5203tacka.php';

class Duz{
    private Tacka $t1;
    private Tacka $t2;

    // konstruktor

    public function __construct(Tacka $t1, Tacka $t2)
    {
        $this->t1 = $t1;
        $this->t2 = $t2;
    }

    // __toString

    public function __toString(): string
    {
        return "Duž između tačaka {$this->t1} i {$this->t2}";
    }

    // vraca duzinu
    public function duzina(): int {
        return $this->t1->rastojanje($this->t2);
    }
}

?>