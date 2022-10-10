<?php 
    require_once("../autoloads.php");
    session_start();

    if($_SESSION['REQUEST_METHOD']='GET'){
        
        if(!empty($_GET['index'])){

            $index=$_GET['index'];
            $inventory=$_SESSION['inventory'];
            $inventoryItems=$inventory->getItems();

            $item=$inventoryItems[$index];
            $item->use();
            echo json_encode($item);
        }
    }
?>