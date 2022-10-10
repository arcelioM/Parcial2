<?php
require_once("../autoloads.php");
session_start();

use model\implementaciones\Inventory as Inventory;


if($_SERVER["REQUEST_METHOD"]=='GET'){
    //unset($_SESSION['inventory']);
    
    if(!isset($_SESSION['inventory'])){
        createInvetory();
        echo "CREANDO";
    }
    
    echo "<pre>";
    var_dump($_SESSION['inventory']);
    echo "</pre>";
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="addItemInventory.php" method="post">
        <input type="text" name="item" id="item">
        <input type="text" name="slices" id="slices">
        <input type="text" name="spoiled" id="spoiled">
        <input type="submit" value="VERIFICAR ADD">
    </form>
</body>
</html>