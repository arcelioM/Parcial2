<?php

namespace model\item;

use model\item\Item as Item;

abstract class Consumable extends Item{

    private bool $consumable;//**SI ES CONSUMIBLE CONSUMIDO */
    private bool $spoiled; //*SI ESTA DAÑADO O NO */

    public function __construct(String $name, int $value, float $weight,bool $consumable, bool $spoiled)
    {
        parent::__construct($name,$value,$weight);
        $this->consumable=$consumable;
        $this->spoiled=$spoiled;
    }

    

    public  function use():String{
        return $this->eat();
    }

    public function eat():String{
        if(!$this->consumable && !$this->spoiled){
            return "NO HAY NADA PARA CONSUMIR";
        }

        if($this->consumable && !$this->spoiled){
            
            $this->value=$this->value-25;
            return "HAS COMIDO $this->name";
        }

        if($this->consumable && $this->spoiled){
            
            $this->value=$this->value-25;
            return "HAS COMIDO $this->name, ESTAS ENFERMO ";
        }
        return "";
    }

    public function isComsumed():bool{
        return $this->consumable;
    }
    public function setConsumable($consumable):void{
        $this->consumable = $consumable;
    }

    public function isSpoiled():bool{
        return $this->spoiled;
    }

    public function __toString()
    {
        return parent::__toString()." | CONSUMABLE: $this->consumable | SPOILED: $this->spoiled";
    }
}
