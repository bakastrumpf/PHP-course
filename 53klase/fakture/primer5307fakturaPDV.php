<?php
include_once 'primer5306faktura.php';

class FakturaPDV extends Faktura{

    public function ispisUkupno(){
        $cenaBezPdv = $this->cena();
        echo "Cena bez PDVa: ".$cenaBezPdv."<br>";
        echo "Cena sa PDVom: ".($cenaBezPdv*1.2);
    }

}


?>