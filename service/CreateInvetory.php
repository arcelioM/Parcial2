<?php
require_once("../autoloads.php");
session_start();

use model\implementaciones\Inventory as Inventory;


if($_SERVER["REQUEST_METHOD"]=='GET'){
    
    if(!isset($_SESSION['inventory'])){
        createInvetory();
        echo true;
    }else{
        echo false;
    }
    
}elseif($_SERVER["REQUEST_METHOD"]=='POST'){
    if(isset($_SESSION['inventory'])){
        unset($_SESSION['inventory']);
        echo true;
    }else{
        echo false;
    }
}

function createInvetory(){
    $inventory=new Inventory();
    $_SESSION['inventory']=$inventory;
}


 /*   $item=new Sword(50,50,100,234.23);
    $invetory->addItem($item);
    $item = new Pizza(1,false);
    $invetory->addItem($item);
    $item=new Bow(40,40,100,234.23);
    $invetory->addItem($item);
    
    echo "<pre>";
    var_dump($invetory->getItems());
    echo "</pre>";
    $invetory->sortByValue();
    echo "<pre>";
    var_dump($invetory->getItems());
    echo "</pre>";
    
    $invetory->sortByWeight(new ItemWieghtComparator());
    echo "<pre>";
    var_dump($invetory->getItems());
    echo "</pre>";*/
?>