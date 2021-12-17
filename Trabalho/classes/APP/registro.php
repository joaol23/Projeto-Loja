<?php

require_once "classes/model.php";

class registro 
{
    public function checarExiste($email){
        $con = new model();
        
        $sql = "SELECT COUNT(0) FROM clientes where email = '" . $email . "'";

        $checar = $con->executeSelect($sql)[0];

        if($checar['COUNT(0)'] == 1){
            return $checar;
            exit;
        }
        return false;
    }

    public function inserirCliente($post, $endereco){
        $con = new model();

        $sql = "INSERT INTO clientes values (null, '".$post['nameReg']."', 
                        '".$post['emailReg']."', '".$post['telefoneReg']."', 
                        '".$post['cepReg']."', '".$endereco."', 
                        '".md5($post['senhaReg'])."')";
        
        $inserir = $con->executeQuery($sql);
        
        return $inserir;
    }

    public function AtualizarCliente($post, $endereco){
        $con = new model();

        $id = $_SESSION['id_user'];
        

        $sql = "UPDATE `clientes` SET 
        `nome`='" . $post['nameReg'] . "',
        `email`='" . $post['emailReg'] . "',
        `telefone`='" . $post['telefoneReg'] . "',
        `cep`='" . $post['cepReg'] . "',
        `endereco`='" . $endereco . "' WHERE id = " . $id;


        $atualizar = $con->executeQuery($sql);

        return $atualizar;
    }


}