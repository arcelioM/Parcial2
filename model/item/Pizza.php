<?php

namespace model\item;

use model\item\Consumable as Consumable;
class Pizza extends Consumable{

    private int $numberOfSlice;
    private int $slicesEaten=0;

    public function __construct(int $numberOfSlice, bool $spoiled){
        
        $this->numberOfSlice=$numberOfSlice;
        parent::__construct("PIZZA",100,12,false,$spoiled);
    }


    public function eat():String{
        if($this->numberOfSlice>$this->slicesEaten){
            $this->slicesEaten++;
            return parent::eat();
        }else{
            parent::reset();
            return "Producto no disponible";
        }  
    }
}
