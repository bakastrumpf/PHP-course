<?php 
class Polje {
    private $kolona, $red;

    public function __construct($kolona, $red)
    {
        $this->kolona = $kolona;
        $this->red = $red;
    }
    public function __get($name)
    {
        return $this->$name;
    }

    public function __toString()
    {
        return $this->kolona.$this->red;
    }
}

?>