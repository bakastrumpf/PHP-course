<?php

abstract class Figura {
    private $boja, $polje;

    public function __construct($boja, $polje)
    {
        $this->boja = $boja;
        $this->polje = $polje;
    }

    public function __get($name)
    {
        return $this->$name;
    }

    abstract public function naziv();
    abstract public function oznaka();

    public function iscrtaj()
    {
        echo "<img src='slike/slike/{$this->naziv()}_{$this->boja}.png'?/>";
    }
    public function __toString()
    {
        return $this->oznaka().$this->polje;
    }
}


class Top extends Figura {
    public function naziv()
    {
        return 'top';
    }
    public function oznaka()
    {
        return 'T';
    }
}

class Lovac extends Figura {
    public function naziv()
    {
        return 'lovac';
    }
    public function oznaka()
    {
        return 'L';
    }
}

?>