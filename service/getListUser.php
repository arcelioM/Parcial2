<?php
    require_once("../autoloads.php");
    session_start();
    if($_SERVER['REQUEST_METHOD']=="GET"){
        
        if(!isset($_SESSION['userList'])){
            echo "ERROR, NO HA SIDO CREADO LISTA DE USUARIO";
        }else{
            $users=$_SESSION['userList'];  
            $usersSend=array();
            foreach($users as $user){
                $userArray=array(
                    'id'=> $user->id,
                    'user'=> $user->user,
                    'edad'=> $user->edad,
                    'numImg'=> $user->numImg
                );
                array_push($usersSend,$userArray);
            }
            echo json_encode($usersSend);
        }

    }
?>