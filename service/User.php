<?php
require_once("../autoloads.php");
use model\User;
session_start();

if($_SERVER['REQUEST_METHOD']=="POST"){
    if(!empty($_POST['user'])){
        
        $user=$_POST['user'];
        $edad=$_POST['edad'];
        $numImg=$_POST['numImg'];

        if(!isset($_SESSION['idUserCont'])){
            $_SESSION['idUserCont']=0;
        }

        $cont=$_SESSION['idUserCont'];
        $newUser=new User($cont,$user,$edad,$numImg);
        createUserSession($newUser);
        $_SESSION['idUserCont']=++$cont;
        
        echo "true";

    }
}elseif($_SERVER['REQUEST_METHOD']=="GET"){
    
    if(!isset($_SESSION['user'])){
        echo "ERROR, NO HA SIDO CREADO EL INVENTARIO";
    }else{
        $user=$_SESSION['user'];

        $userSend=array(
            'id'=> $user->id,
            'user'=> $user->user,
            'edad'=> $user->edad,
            'numImg'=> $user->numImg
        );
        echo json_encode($userSend);
    }

}

function createUserSession($user){
    $_SESSION['user']=$user;
    addUserList($user);
}

function addUserList($user){
    $users=null;
    if(!isset($_SESSION['userList'])){
        $users=array();
        $_SESSION['userList']=$users;
    }
    $users=$_SESSION['userList'];

    array_push($users,$user);
    $_SESSION['userList']=$users;  
}

?>