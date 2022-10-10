<?php 
    require_once("../autoloads.php");
    session_start();

    if($_SESSION['REQUEST_METHOD']='POST'){
        
        if(!empty($POST['index'])){

            $index=$_POST['index'];
            $inventory=$_SESSION['inventory'];
            $inventoryItems=$inventory->getItems();

            $item=$inventoryItems[$index];
            $item->use();
            echo json_encode($item);
        }
    }
?>