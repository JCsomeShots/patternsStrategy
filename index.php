<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sprint 3 nivell 2</title>
        <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
        <h1 class="text-center text-xl m-4 p-4"> Adapter</h1>
        <h2 class="text-center text-lg "> Nivell 2</h2>
<section class=" bg-green-400 p-10">
<?php

echo '<h3 class="text-center p-1 text-xl mb-9"> Exercici 3 : Strategy  </h3>';
echo "<p>Penseu en la següent funció simple amb el nom couponGenerator que genera diferents cupons per a diferents tipus d'automòbils. Per a aquells que estan interessats en comprar un BMW ofereix un cupó diferent a el d'aquells que estiguin interessats en comprar un Mercedes.</p>";
echo "<p> El cupó té en compte els següents factors per ponderar la taxa de descompte:</p>";
echo "<p> És possible que desitgem oferir un descompte durant una recessió en la compra d'automòbils. En el nostre codi se li denomina a aquest atribut com isHighSeason.</p>";
echo "<p> És possible que desitgem oferir un descompte quan l'estoc d'automòbils a la venda sigui massa gran. En el nostre codi se li denomina a aquest atribut com bigStock.</p>";


interface CarCouponGenerator {
  public function makeDiscount($discount);
}

  class BmwAddSeasonDiscount implements CarCouponGenerator{
    public function makeDiscount($discount){
      return $discount += 5;
    }
  }
  class BmwAddStockDiscount implements CarCouponGenerator{
    public function makeDiscount($discount){
      return $discount += 7;
    }
  }
  class MercedesAddSeasonDiscount implements CarCouponGenerator{
    public function makeDiscount($discount){
      return $discount += 4;
    }
  }
  class MercedesAddStockDiscount implements CarCouponGenerator{
    public function makeDiscount($discount){
      return $discount += 10;
    }
  }
 

function cupounGenerator($car , $discount = 0 , $isHighSeason = false ,
$bigStock = false){
    

    if ($car == "bmw"){
      if ($isHighSeason) {
        $discount = (new BmwAddSeasonDiscount())->makeDiscount($discount);
      }
      if ($bigStock) {
        $discount = (new BmwAddStockDiscount())->makeDiscount($discount);
      }
    } else if ($car == "mercedes") {
     if (!$isHighSeason) {
       $discount = (new MercedesAddSeasonDiscount())->makeDiscount($discount);
      }
     if ($bigStock) {
       $discount = (new MercedesAddStockDiscount())->makeDiscount($discount);
      }
    }
    echo  "Get {$discount}% off the price of your new car.";

  }

cupounGenerator("bmw" , 10 , 0 , 0);




class CalculateDiscount{

  // protected $discountRate;

  // public function __constructor(CarCouponGenerator $discountRate = null){
  //   $this->$discountRate = $discountRate ;
  // }


  public function execute($discount , $discountRate){
    if ($discountRate == 1){
      return (new BmwAddSeasonDiscount())->makeDiscount($discount);
    }
    if ($discountRate == 2) {
          return (new BmwAddStockDiscount())->makeDiscount($discount);
    }
    if ($discountRate == 3) {
          return (new MercedesAddSeasonDiscount())->makeDiscount($discount);
    }
    if ($discountRate == 4) {
          return (new MercedesAddStockDiscount())->makeDiscount($discount);
    }
  }
  
}


// $descuento = new CalculateDiscount();
// $result = $descuento->execute(10,2);
// var_dump($result);

