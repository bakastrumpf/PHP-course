<?php

class Automobil{
    // private var $marka;
    var $marka;
    var $registracija;
    var $boja;

    public function __construct($marka, $boja, $registracija = null)
    {
        // echo "Konstruktor pozvan<br>";
        $this->marka = $marka;
        $this->boja = $boja;
        $this->registracija = $registracija;
    }

    public function postaviRegistraciju($nova_registracija){
        $this->registracija = $nova_registracija;
    }

    function promeniBoju($nova_boja){
        $this->boja = $nova_boja;
    }

    function dohvatiBoju(){
        return $this->boja;
    }

    function __toString()
    {
        return $this->marka." ".$this->boja." ".$this->registracija;
    }

}

?>