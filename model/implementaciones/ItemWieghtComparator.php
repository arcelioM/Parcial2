<?php

namespace model\implementaciones;

use model\interfaces\ItemComparator as ItemComparator;
use model\item\Item as Item;

class ItemWieghtComparator implements ItemComparator{

    /**
     **COMPARARA LOS ITEMS DE ACUERDO A SU PESO(WEIGHT)
     *@param Item $first
     *@param Item $second
     *@return int 1 *SI EL VALOR DEL PRIMER ITEM ($first) ES MAYOR QUE EL SEGUNDO ITEM ($second)
     *@return int -1 *SI EL VALOR DEL PRIMER ITEM ( $fisrt) ES MENOR AL SEGUNDO ITEM ($second)
     *@return int 0 *SI SON IGUALES
     */
    public function compare(Item $first, Item $second):int{
        
        if($first->weight > $second->weight){
            return 1;
        } 

        if($first->weight < $second->weight){
            return -1;
        }

        return $first->compareTo($second);
    }
}
