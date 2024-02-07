<?php

class Kamer {
    public $lengte;
    public $breedte;
    public $hoogte;
    
    function __construct($lengte, $breedte, $hoogte) {
        $this->lengte = $lengte;
        $this->breedte = $breedte;
        $this->hoogte = $hoogte;
    }
    
    function berekenVolume() {
        return $this->lengte * $this->breedte * $this->hoogte;
    } 
}

class Huis {
    public $kamers = [];
    
    function voegKamerToe($kamer) {
        $this->kamers[] = $kamer;
    }
    
    function berekenTotaleGrootte() {
        $totaleGrootte = 0;
        foreach ($this->kamers as $kamer) {
            $totaleGrootte += $kamer->berekenVolume();
        }
        return $totaleGrootte;
    }
    
    function berekenPrijs() {
        $totaleGrootte = $this->berekenTotaleGrootte();
        // Simpele prijsberekening, bijvoorbeeld €100 per kubieke meter
        $prijsPerKubiekeMeter = 100;
        return $totaleGrootte * $prijsPerKubiekeMeter;
    }
}

// Voorbeeld gebruik
$kamer1 = new Kamer(5, 4, 3);
$kamer2 = new Kamer(6, 4, 3);

$huis = new Huis();
$huis->voegKamerToe($kamer1);
$huis->voegKamerToe($kamer2);

echo "Totale grootte van het huis: " . $huis->berekenTotaleGrootte() . " kubieke meter\n";
echo "Prijs van het huis: €" . $huis->berekenPrijs() . "\n";

?>