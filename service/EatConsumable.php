<?php

require_once("../autoloads.php");
use model\item\Consumable as Consumable;
session_start();

/**
 * *Este servicio se encargara de procesar la accion de comer 'eat'
 * *Revisara solo peticiones POST
 * *con dos argumentos
 * @param int $index QUE ES LA POSICION DEL ITEM EN EL INVETARIOS
 * 
 */
if($_SESSION['REQUEST_METHOD']='POST'){
    
    if(!empty($_POST['index'])){

        $index=$_POST['index'];
        $inventory=&$_SESSION['inventory'];
        $inventoryItems=&$inventory->getItems();

        $item=&$inventoryItems[$index];
        if($item instanceof Consumable){

            if($item->isComsumed()){
                $item->eat();
                echo json_encode($item);
            }else{
                echo "NO SE PUEDE CONSUMIR";
            }
            
        }else{
            echo "Accion no valida";
        }
        
    }
}
?>

