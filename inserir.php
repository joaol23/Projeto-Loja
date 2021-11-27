<?php

require_once 'classes/APP/registro.php';

$con = new registro();

$checar = $con->checarExiste($_POST['emailReg']);

$endereco = $_POST['stateReg'] . ", " . $_POST['enderecoReg'];

if($_POST['senhaReg'] != $_POST['senhaRegConfirm']){
    $msg = 'Senha e confirmação diferentes!';
    echo json_encode(array('senha'=>$msg));
    die;
}

if($checar){
    $msg = 'Email existente!';
    echo json_encode(array('email'=>$msg));
}else{
    $inserir = $con->inserirCliente($_POST,$endereco);
    if($inserir){        
        $msg = "Cliente cadastrado com sucesso!";
    echo json_encode(array('cadastrado'=>$msg));
    }
}