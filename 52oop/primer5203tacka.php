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

    public function rastojanje(Tacka $tacka): float {
        return sqrt(pow($tacka->x-$this->x, 2) + pow($tacka->y-$this->y, 2));
    }

    public function __toString(): string
    {
        return "({$this->x}, {$this->y})";
        // return "(".$this->x.",".$this->y.")";
    }

    public function __get($name)
    {
        if(property_exists($this, $name)){
            echo "Dohvatam vrednost polja $name ";
            return $this->$name;
        }
        echo "Polje $name ne postoji";
        return null;
        
    }

    public function __set($name, $value)
    {
        if(property_exists($this, $name)){
            echo "Setuje vrednost $name";
        $this->name = $value;
        } else {
            echo "Polje $name ne postoji";
        }
        
    }

}

?>