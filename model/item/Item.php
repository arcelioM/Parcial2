<?php

namespace model\item;

use model\item\Comparable as Comparable;
abstract class Item implements Comparable{

    private static int $numberOfItem=0;
    private static int $id=0;
    private int $value;
    private String $name;
    private float $weight;

    /**
     * REVISAR ID
     */
    public function __construct(String $name, int $value, float $weight)
    {
        $this->name=$name;
        $this->value=$value;
        $this->weight=$weight;
        Item::$id++;
        Item::$numberOfItem++; 
    }

    public abstract function use():String;

    /**
     * @param Item $otherItem
     * *COMPARAR EL ATRIBUTO '$value' OBJETO ITEM ACTUAL($this) CON EL '$value' DE OTRO OBJETO ($otherItem) PARA SABER CUAL ES EL MAYOR
     * @return int 1 *SI EL VALOR DEL OBJETO ACTUAL ($this) ES MAYOR AL OTRO OBJETO ($otherItem)
     * @return int -1 *SI EL VALOR DEL OBJETO ACTUAL( $this) ES MENOR AL OTRO OBJETO ($otherItem)
     * @return int 0 *SI SON IGUALES
     * */
    public function compareTo(Item $otherItem):int{
        
        if($this->value>$otherItem->value){
            return 1;
        }else if($this->value<$otherItem->value){
            return -1;
        }

        /**
         * TODO: CONSULTE A 'https://www.php.net/manual/es/function.strcasecmp.php' | para ver funcionamiento del metodo 'strcasecmp'
         * 
         */
        return strcasecmp($this->name,$otherItem->name);

    }

    public function __toString()
    {
        return " $this->name -- VALUE: $this->value | WEIGHT: $this->weight";
    }

    public function __get($property)
    {
        if($property=='numberOften'){
            return null;
        }

        if(property_exists($this,$property)){
            return $this->$property;
        }
    }

    public function __Set($property,$value){

        if($property=='numberOften' || $property=='id'){
            return null;
        }

        if(property_exists($this,$property)){
            $this->$property=$value;
        }
    }

    public static function reset():void{
        Item::$numberOfItem--;
    }

}
