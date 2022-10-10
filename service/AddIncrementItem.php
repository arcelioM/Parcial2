<?php

    if($_SERVER['REQUEST_METHOD']=='POST'){

        if(!empty($_POST['index'])){

            $index=$_POST['index'];
            $durabilityModifier=$_POST['dModifier'];
            $damageModifier=$_POST['dModifier'];
            $inventory=$_SESSION['inventory'];
            $inventoryItems=$inventory->getItems();

            $item=$inventoryItems[$index];
            $item->use();
            echo json_encode($item);
        }
    }

?>