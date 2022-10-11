<?php

require_once("../autoloads.php");
session_start();
    if($_SERVER["REQUEST_METHOD"]=='GET'){
    
        
        /**
         * *VALIDANDO QUE LA VARIABLE DE SESSION SE HAYA CREADO
         */
        if(!isset($_SESSION['inventory'])){
            echo "ERROR, NO HA SIDO CREADO EL INVENTARIO";
        }
        
        $inventory=$_SESSION['inventory'];//*SE OBTIENE EL VALOR DEL INVENTARIO EN SESSION
        $inventoryItems=$inventory->getItems();

        $sendInventory=array();
        foreach($inventoryItems as $item){
           if($item->name=="PIZZA"){
             array_push($sendInventory,createArrayItem($item));
           }
            
        }

        echo json_encode($sendInventory);
          
    }

    function createArrayItem($item){
        $itemArray=null;
        if($item->name=="PIZZA"){
            $itemArray=array(
                "id"=> $item->id,
                "name"=> $item->name,
                "value"=> $item->value,
                "weight"=>$item->weight,
                "consumable"=>$item->isComsumed()
            );
        }
        
        return $itemArray;
    }

?>