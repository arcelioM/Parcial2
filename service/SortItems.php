<?php

    require_once("../autoloads.php");
    use model\implementaciones\ItemWieghtComparator;
    session_start();   
    if($_SERVER['REQUEST_METHOD']=='POST'){

        if(!empty($_POST['sortBy'])){

            $sortBy=$_POST['sortBy'];
            $inventory=&$_SESSION['inventory'];
            
            if($sortBy=='weight'){
                $inventory->sortByWeight(new ItemWieghtComparator());
            }elseif($sortBy=='value'){
                $inventory->sortByValue();
            }
            
            echo json_encode($inventory);
        }
    }

?>