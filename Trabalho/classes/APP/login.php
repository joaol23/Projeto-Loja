<?php

require_once "classes/model.php";

class login 
{

    public function checarCliente($email, $senha){
        try{
            $con = new model();

            $sql = "SELECT count(0) FROM clientes where email = '" . $email . "' and senha = '" . md5($senha) . "'";
            
            $this->logged = false;
            $listar = $con->executeSelect($sql)[0];
            if($listar['count(0)'] == 1){
            return $listar;
            exit;
        }
        return false;
        } catch(PDOException $msg){
            echo "Não foi possível checar o cliente. " . $msg->getMessage();
        }
    }

    public function getClientLogged($email){
    
            $con = new model();

            $sql = "SELECT * FROM clientes where email = '" . $email . "'";
            
            $listar = $con->executeSelect($sql);

            return $listar[0];
    }

    public function getClienteByID($id){
        if(is_numeric($id)){
            $con = new model();

            $sql = "SELECT * FROM clientes where id = '" . $id . "'";

            $listar = $con->executeSelect($sql);

            return $listar[0];
        }else{
            return false;
        }
    }
}