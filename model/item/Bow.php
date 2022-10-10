<?php

namespace model\item;

use model\item\Weapon as Weapon;
class Bow extends Weapon{
	
    private const NAME="Bow";
    public function __construct(float $baseDamage, float $baseDurability, int $value, float $weight){
        parent::__construct(Bow::NAME,$baseDamage,$baseDurability,$value,$weight);
    }

    /**
     * *AUMENTA EL VALOR DE LA VARIABLE 'durabilityModifier'
     */
    public  function polish():void{
        /**
         * *VALIDA QUE EL ATRIBUTO Durabilit NO SUPERA EL VALOR DE 1
         */
        if(parent::getDurability()<1 && (parent::getDurability()+parent::MODIFIER_CHANGE_RATE)<1){
            $increDurability=parent::getDurability()+parent::MODIFIER_CHANGE_RATE;
            parent::setDurabilityModifier($increDurability);
        }
    }
}
