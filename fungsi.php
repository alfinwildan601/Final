<?php

class Canteen
{
  public $pizza, $spaghetti, $amountP, $amountS, $priceS, $priceP, $total, $totalpricespaghetti, $totalpricepizza;

  function __construct()
  {
    $this->priceS = 25000;
    $this->priceP = 22000;
  }
}

class Amount extends Canteen
{
  public function getAmmount($amountP, $amountS)
  {
    $this->amountP = $amountP;
    $this->amountS = $amountS;
  }

  public function setPrice()
  {
    $this->totalpricespaghetti = $this->priceS * $this->amountP;
    $this->totalpricepizza = $this->priceP * $this->amountS;
    $this->total = $this->totalpricespaghetti + $this->totalpricepizza;
  }
  public function copyReceipt()
  {
    echo "* <b>$ Fyn Shop $</b> *";
    echo "<br>";
    echo "Cappucino: $this->amountP x Rp. $this->priceS: <b>$this->totalpricespaghetti</b>";
    echo "<br>";
    echo "Mochalatte : $this->amountS x Rp. $this->priceP: <b>$this->totalpricepizza</b>";
    echo "<br><br>";
    echo "Total Payment Rp. <b>$this->total</b>";
    echo "<br>";
   
  }
}