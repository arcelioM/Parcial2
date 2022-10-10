<?php
require_once("../autoloads.php");
use model\User;
session_start();

if($_SERVER['REQUEST_METHOD']=="POST"){
    if(!empty($_POST['user'])){
        
        $user=$_POST['user'];
        $edad=$_POST['edad'];
        $numImg=$_POST['numImg'];
        $newUser=new User($user,$edad,$numImg);
        createUserSession($newUser);
        
        echo "true";

    }
}elseif($_SERVER['REQUEST_METHOD']=="GET"){
    
    if(!isset($_SESSION['user'])){
        echo "ERROR, NO HA SIDO CREADO EL INVENTARIO";
    }else{
        $user =$_SESSION['user'];

        $userSend=array(
            'id'=> User::getId(),
            'user'=> $user->user,
            'edad'=> $user->edad,
            'numImg'=> $user->numImg
        );
        echo json_encode($userSend);
    }

}

function createUserSession($user){
    $_SESSION['user']=$user;
}

?>