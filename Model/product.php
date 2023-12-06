<?php
class product{
 protected float $price;

 public int $sconto = 0;

protected int $quantity;

public function __construct($price,$quantity){
    $this->quantity=$quantity;
    $this->price=$price;
}
public function setDis(int $perc){
    if($perc > 70){
        throw new exception ('nessuno sconto');
    }
        else{
            $this->sconto=10;
        };
    
    }
    public function getDis(){
        return $this->sconto;
    }
}



?>