<?php

require_once "classes/model.php";

class compra
{

    public function addLancheWithQtd($qntd, $preco, $id_lanche, $id_cliente)
    {
        $con = new model();

        $sql = "INSERT INTO `itens_venda`
                (`id`, `quantidade`, `valor_per_unidade`, `lanches_id`, `cliente_id`) 
                VALUES (null, '" . $qntd . "', '" . $preco . "', '" . $id_lanche . "', '" . $id_cliente . "')";

        $inserir = $con->executeQuery($sql);

        return $inserir;
    }

    public function getItensCarrinho($id)
    {
        $con = new model();

        $sql = "SELECT itens_venda.quantidade AS lanchesQtd, 
        itens_venda.valor_per_unidade AS precoCada, lanches.nome AS nomeLanche, 
        lanches.descricao AS descLanche, clientes.nome AS nomeCliente, clientes.endereco
        AS enderecoCliente FROM itens_venda
        JOIN clientes ON itens_venda.cliente_id = clientes.id
        JOIN lanches ON itens_venda.lanches_id = lanches.id
        WHERE cliente_id = " . $id . " && ativo_carrinho <> 'F'";

        $listar = $con->executeSelect($sql);


        return $listar;
    }

    public function deleteCarrinho($id){
        $con = new model();

        $sql = "UPDATE `itens_venda` SET `ativo_carrinho` = 'F', `quantidade`= 0 WHERE cliente_id = '" . $id . "'";

        $update = $con->executeQuery($sql);

        return $update;
    }

    public function getprecoCarrinho($id){
        $con = new model();

        $sql = "SELECT SUM(itens_venda.valor_per_unidade * itens_venda.quantidade) as preco_total 
        FROM itens_venda WHERE cliente_id = '". $id ."'";

        $listar = $con->executeSelect($sql);

        return $listar[0];

    }

    public function addQtdLanche($qtd_anttes, $qnt_insert, $id_lanche, $id_cliente)
    {
        $con = new model();
        $qntd = intval($qtd_anttes['quantidade']) + intval($qnt_insert);

        $sql = "UPDATE itens_venda SET quantidade = '" . $qntd . "', ativo_carrinho = 'V' WHERE lanches_id = '" . $id_lanche . "' && cliente_id = '" . $id_cliente . "'";

        $upadate = $con->executeQuery($sql);

        return $upadate;
    }
}
