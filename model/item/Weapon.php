<?php

namespace model\item;

use model\item\Item as Item;

abstract class Weapon extends Item{
    const  MODIFIER_CHANGE_RATE=0.05;
    private float $baseDamage;
    private float $damageModifier;
    private float $baseDurability;
    private float $durabilityModifier;

    public function __construct(String $name, float $baseDamage,float $baseDurability,int $value,float $weight){
        parent::__construct($name,$value,$weight);
        $this->baseDamage=$baseDamage;
        $this->baseDurability=$baseDurability;
    }

    public abstract function polish():void;

    
     public function use():String{

        if($this->getDurability()<=0){
            
            return "EL MARTILLO ESTA ROTO, NO PUEDE SER USADO";
        }

        $this->baseDamage=$this->baseDurability-Weapon::MODIFIER_CHANGE_RATE;

        $message="CAUSASTE 30 PUNTOS DE DAÑO A TU OPONENTE";
        if($this->getDurability()<=0){
            return $message." EL MARTILLO SE ROMPE";
        }
        return $message;
    }

    /**
     * Get the value of baseDamage
     */ 
    public function getBaseDamage():float{
        return $this->baseDamage;
    }

    /**
     * Set the value of baseDamage
     */ 
    public function setBaseDamage($baseDamage):void{
        $this->baseDamage = $baseDamage;
    }

    /**
     * Get the value of damageModifier
     */ 
    public function getDamageModifier():float{
        return $this->damageModifier;
    }

    /**
     * Set the value of damageModifier
     */ 
    public function setDamageModifier($damageModifier):void{
        $this->damageModifier = $damageModifier;

    }

    /**
     * Get the value of baseDurability
     */ 
    public function getBaseDurability():float{
        return $this->baseDurability;
    }

    /**
     * Set the value of baseDurability
     */ 
    public function setBaseDurability($baseDurability):void{
        $this->baseDurability = $baseDurability;
    }

    /**
     * Get the value of durabilityModifier
     */ 
    public function getDurabilityModifier():float{
        return $this->durabilityModifier;
    }


    public function setDurabilityModifier($durabilityModifier):void{
        $this->durabilityModifier = $durabilityModifier;

    }

    /**
     * *DEVOLVERA EL DAÑO QUE PUEDA HACER UN ARMA
     * @return  float $damage
     */
    public function getDamage():float{
        return $this->baseDamage + $this->damageModifier;
    }

    /**
     * *DEVOLVERA LA DURABILIDAD DEL ARMA
     * @return float $durability
     */
    public function getDurability():float{
        return $this->baseDurability + $this->durabilityModifier;
    }

    public function __toString():String{
        return parent::__toString()." |  DAMAGE: ".number_format($this->getDamage(),2)." | DURABILITY: ".(number_format($this->getDurability()*100,2))."% ";
    }
}
