<?php

    // klasa Tacka, koordinate x i y
    // napisati konstruktor i metodu za ispis
    // metoda za izracunavanje rastojanja od druge tacke

class Tacka{

    private int $x;
    private int $y;

    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    function get_x(): int {
        return $this->x;
    }

    function get_y(): int {
        return $this->y;
    }

    // vraca niz duzine 2 sa koordinatama x i y
    function get_coord(): array {
        // return $this->x;
        // return $this->y;
        return [$this->x, $this->y];
    }

    public function rastojanje(Tacka $tacka): int {
        return sqrt(pow($tacka->x-$this->x, 2) + pow($tacka->y-$this->y, 2));
    }

    public function __toString(): string
    {
        return "({$this->x}, {$this->y})";
        // return "(".$this->x.",".$this->y.")";
    }


}

?>