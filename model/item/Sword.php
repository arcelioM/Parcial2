<?php

namespace model\item;
use model\item\Weapon as Weapon;
class Sword extends Weapon{

     private const NAME="Sword";
     private float $baseDamageDefault;
     private float $baseDamageInitial;
    public function __construct(float $baseDamage, float $baseDurability, int $value, float $weight){
        parent::__construct(Sword::NAME,$baseDamage,$baseDurability,$value,$weight);
        $this->baseDamageDefault=$baseDamage;
        $this->baseDamageInitial=$baseDamage +($baseDamage*0.25);
    }

    public  function polish():void{
        $this->baseDamageDefault=$this->baseDamageDefault+parent::MODIFIER_CHANGE_RATE;

        /**
         * *VALIDO QUE EL AUMENTO NO HAYA SUPERADO EL 25% DEL VALOR INICIAL DE 'BASEDAMAGE'
         */
        if($this->baseDamageDefault < $this->baseDamageInitial){
            $increDamage=parent::getDamageModifier()+parent::MODIFIER_CHANGE_RATE;
            parent::setDamageModifier($increDamage);
        }

    }
}
