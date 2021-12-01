<?php

require_once 'config.php';

$con = new registro();

session_start();
if(!empty($_SESSION['logged'])){
    if($_SESSION['logged'] == true){
        $id = $_SESSION['id_user'];
        $conL = new login();
        $listar = $conL->getClientAll($id);
    }
}

if($listar['email'] != $_POST['emailReg']){
$checar = $con->checarExiste($_POST['emailReg']);
}

if($listar['senha'] != md5($_POST['senhaReg'])){
    $checarSenha = "Senha errada!";
}

$endereco = $_POST['stateReg'] . ", " . $_POST['enderecoReg'];

if($_POST['senhaReg'] != $_POST['senhaRegConfirm']){
    $msg = 'Senha e confirmação diferentes!';
    echo json_encode(array('senha'=>$msg));
    die;
}

if(!empty($checarSenha)){    
    echo json_encode(array('senhaWrong'=>$checarSenha));
    die;
}

if(!empty($checar)){
    $msg = 'Email existente!';
    echo json_encode(array('email'=>$msg));
}else{
    $atualizar = $con->AtualizarCliente($_POST,$endereco);
    if($atualizar){        
        $msg = "Cliente Atualizador com sucesso!";
    echo json_encode(array('atualizado'=>$msg));
    }
}