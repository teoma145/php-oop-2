<?php
trait DrawCard{
    public function printcard($item){
       extract($item);
        include __DIR__.'/../Views/card.php';
    
    }
}

?>