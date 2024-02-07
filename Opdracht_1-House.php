<?php

Class House{
    public $floor;
    public $kamers;
    public $price;
    public $volume;

    function __construct($floor, $kamers , $price, $volume){
        $this->floor = $floor;
        $this->kamers = $kamers;
        $this->price = $price;
        $this->volume= $volume;


    }
 }
$house1 =  new  House(2,"4 kamers",150000,"75m");


$house2 = new House(3, "6 kamers", "€225000", "75m3");

$house3 = new House(3, "6 kamers", "€225000", "8m3");

 

echo "Huis 1 <br>";
echo "Het huis heeft $house1->floor verdiepingen <br>";
echo "Het huis heeft $house1->kamers kamer <br>";
echo "De prijs van het huis is $house1->price<br>";
echo "Het volume van het huis is $house1->volume<br> <br>";


echo "Huis 2 <br>";
echo "Het huis heeft $house2->floor verdiepingen <br>";
echo "Het huis heeft $house2->kamers kamer <br>";
echo "De prijs van het huis is $house2->price<br>";
echo "Het volume van het huis is $house2->volume <br><br>";


echo "Huis 3 <br>";
echo "Het huis heeft $house3->floor verdiepingen <br>";
echo "Het huis heeft $house3->kamers kamer <br>";
echo "De prijs van het huis is $house3->price<br>";
echo " Het volume van het huis is $house3->volume";



?>