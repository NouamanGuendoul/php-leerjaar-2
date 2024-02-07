<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

class figure{

    public $color;
    public $cirkel;
    public $driehoek;
    public $vierkant;
    public $rechthoek;
    public $lengte;
    public $breedte;

    function __construct( string $color,string $cirkel, float $lengte, float $breedte){
        $this->cirkel = $cirkel;
        $this->lengte = $lengte;
        $this->breedte = $breedte;

}




}
?>


<br>
<h1>Vierkant</h1>
<svg width="400" height="180" xmlns="">
  <rect x="50" y="20" width="150" height="150"
  style="fill:lightblue;stroke:black;stroke-width:5;opacity:0.5" />
</svg>

<svg width="400" height="180" xmlns="">
  <rect x="50" y="20" width="150" height="150"
  style="fill:purple;stroke:black;stroke-width:5;opacity:0.5" />
</svg>

<svg width="400" height="180" xmlns="">
  <rect x="50" y="20" width="150" height="150"
  style="fill:green;stroke:black;stroke-width:5;opacity:0.5" />
</svg>

<br>
<h1>circel</h1>
<svg height="100" width="100" xmlns="">
  <circle r="45" cx="50" cy="50" stroke="black" stroke-width="3" fill="lightblue" />
</svg>

<svg height="100" width="100" xmlns="">
  <circle r="45" cx="50" cy="50" stroke="black" stroke-width="3" fill="purple" />
</svg>

<svg height="100" width="100" xmlns="">
  <circle r="45" cx="50" cy="50" stroke="black" stroke-width="3" fill="green" />
</svg>

<h1>Rechthoek</h1>

<svg width="400" height="150" xmlns="">
  <rect width="300" height="100" style="fill:rgb(173, 216, 230);stroke-width:3;stroke:black" />
</svg>

<svg width="400" height="150" xmlns="">
  <rect width="300" height="100" style="fill:rgb(160,32,240);stroke-width:3;stroke:black" />
</svg>
<svg width="400" height="150" xmlns="">
  <rect width="300" height="100" style="fill:rgb(0, 128, 0);stroke-width:3;stroke:black" />
</svg>

</body> 
</html>

