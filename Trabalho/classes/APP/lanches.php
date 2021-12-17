<?php

require_once "classes/model.php";

class lanches
{
    public function getLanches(){
        $con = new model();

        $sql = "SELECT * FROM lanches";

        $listar = $con->executeSelect($sql);
        
        return $listar;
    }
    
    public function checarExisteLanche($id_lanche, $id_cliente){
        $con = new model();
        
        $sql = "SELECT COUNT(0) FROM itens_venda where lanches_id = '" . $id_lanche . "' && cliente_id = '" . $id_cliente . "'";

        $checar = $con->executeSelect($sql)[0];

        if($checar['COUNT(0)'] == 1){
            return $checar;
            exit;
        }
        return false;
    }

    public function getLanchesDestaque(){
        $con = new model();

        $sql = "SELECT * FROM lanches WHERE destaque_lanche <> 'F'";

        $listar = $con->executeSelect($sql);

        return $listar;
    }

    public function getQtdLanche($id_lanche, $id_cliente){
        $con = new model();

        $sql = "SELECT quantidade FROM itens_venda WHERE lanches_id  = '". $id_lanche . "' && cliente_id = '" . $id_cliente . "'";

        $listar = $con->executeSelect($sql);

        return $listar;
    }

    public function getLanchesPrecoByID($id){
        $con = new model();

        $sql = "SELECT preco FROM lanches WHERE id = " . $id;

        $listar = $con->executeSelect($sql);

        return $listar[0];
    }
} 