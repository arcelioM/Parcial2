<?php
require_once("../autoloads.php");
session_start();
use model\item\Bow as Bow;
use model\item\Pizza as Pizza;
use model\item\Sword as Sword;


if($_SERVER["REQUEST_METHOD"]=='POST'){
    
    if(!empty($_POST) && !empty($_POST['item'])){
        
        /**
         * *VALIDANDO QUE LA VARIABLE DE SESSION SE HAYA CREADO
         */
        if(!isset($_SESSION['inventory'])){
            echo "ERROR, NO HA SIDO CREADO EL INVENTARIO";
        }
        
        $inventory=$_SESSION['inventory'];//*SE OBTIENE EL VALOR DEL INVENTARIO EN SESSION

        $item=createItem($_POST);

        $inventory->addItem($item);

        $inventoryItems=$inventory->getItems();

        echo json_encode($inventoryItems);

        /*echo "<pre>";
        var_dump($item);
        echo "</pre>";
        
        echo "<pre>";
        var_dump($inventoryItems);
        echo "</pre>";*/
          
    }


}


function createItem($values){
    $item=null;
    $nameItem=$values['item'];

    if($nameItem==="pizza"){
        $numverOfSlice=$values['slices'];
        $spoiled=$values['spoiled'];
        $item=new Pizza($numverOfSlice,$spoiled);

    }elseif($nameItem==="sword" || $nameItem==="bow"){
        $baseDamage=$values['baseDamage'];
        $baseDurability=$values['baseDurability'];
        $value=$values['value'];
        $weight=$values['weight'];
        $item=($nameItem==="sword")?
        new Sword($baseDamage,$baseDurability,$value,$weight):
        new Bow($baseDamage,$baseDurability,$value,$weight);

        $item->setDamageModifier(0);
        $item->setDurabilityModifier(0);
    }

    return $item;
}

?>