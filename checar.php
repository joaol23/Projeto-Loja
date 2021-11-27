<?php

require_once 'classes/APP/login.php';

$con = new login();

$checar = $con->checarCliente($_POST['emailLogin'],$_POST['senhaLogin']);

if($checar){ 
    $listar = $con->getClientLogged($_POST['emailLogin']);
    $id = $listar['id'];    
    echo json_encode(array('login'=>$id));
}else{
    $msg = "Login não existe!";
    echo json_encode(array('erro'=>$msg));
}