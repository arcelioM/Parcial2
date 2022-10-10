<?php
namespace model\implementaciones;

use model\interfaces\ItemComparator as ItemComparator;
use model\item\Item as Item;


class Inventory implements ItemComparator{
    private $items=array();

    public function addItem(Item $item):void{
        $this->items[]=$item;
    }

    /**
     * ORDENAR LOS ITEMS
     */
    public function sortByValue():void{  # code...

        usort($this->items,function($x,$y){
            return $x->compareTo($y);
        });
    }

    public function sortByWeight(ItemComparator $comparator):void{
        # code...
        usort($this->items,array($comparator,"compare"));
    }

    public function getItems():array{
        return $this->items;
    }
}

