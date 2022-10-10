<?php
    require_once("../autoloads.php");
    session_start();   
    if($_SERVER['REQUEST_METHOD']=='POST'){

        if(!empty($_POST['index'])){

            $index=$_POST['index'];
            $durabilityModifier=$_POST['duModifier'];
            $damageModifier=$_POST['daModifier'];
            $inventory=$_SESSION['inventory'];
            $inventoryItems=$inventory->getItems();

            $item=$inventoryItems[$index];
            $item->setDamageModifier($damageModifier);
            $item->setDurabilityModifier($durabilityModifier);

            $inventoryItems[$index]=$item;
            echo json_encode($item);
        }
    }

?>