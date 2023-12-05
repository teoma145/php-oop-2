<?php
class product{
 protected float $price;

 public int $sconto;

protected int $quantity;

public function __construct($price,$quantity){
    $this->quantity=$quantity;
    $this->price=$price;
}
public function setDis($title){
    if($title =='Gunfight at Rio Bravo'){
    return $this->sconto=20;
    }
}
}


?>