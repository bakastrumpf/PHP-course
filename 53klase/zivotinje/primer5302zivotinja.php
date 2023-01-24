<?php

class Zivotinja{
    // boja, ime
    private $boja;
    private $ime;

    // konstruktor
    public function __construct($boja, $ime)
    {
        $this->boja = $boja;
        $this->ime = $ime;
    }

    // get
    public function __get($name) {
        echo "<br>Pristup polju: ".$name."<br>";
        return $this->$name;
    }

    // set
    public function __set($name,$value) {
        echo "<br>Postavljamo polje: ".$name."<br>";
        $this->$name=$value;
    }

    // toString
    function __toString()
    {
        return "<br>{$this->ime} ({$this->boja})";
    }

    public function vrsta(){
        return "nepoznata vrsta";
    }

}


class Pas extends Zivotinja {
    public function vrsta(){
        return "pas-".$this->boja;
    }
}

class Macka extends Zivotinja {
    public function vrsta(){
        return "macka-".$this->boja;
    }

    public function __toString(){
        return "Macka ".parent::__toString();
    }
    
}

class PersijskaMacka extends Macka {
    public function vrsta(){
        return "persijska mačka";
    }
}

class Labrador extends Pas {
    public function vrsta(){
        return "labrador";
    }
}

?>
