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

    public function getLanchesDestaque(){
        $con = new model();

        $sql = "SELECT * FROM lanches WHERE destaque_lanche <> 'F'";

        $listar = $con->executeSelect($sql);

        return $listar;
    }
} 