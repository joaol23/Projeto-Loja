<?php

include 'config.php';

session_start();

$countI = 1;

$conp = new lanches();

if (!empty($_SESSION['logged'])) {
    if ($_SESSION['logged'] == true) {
        $idCliente = $_SESSION['id_user'];
        foreach ($_POST as $value) {

            if ($countI % 2 != 0) {
                $qntd = $value;
            }

            if ($countI % 2 == 0) {

                $id_lanche = $value;

                if ($qntd != 0) {
                    if (is_numeric($id_lanche)) {
                        $precoLanche = $conp->getLanchesPrecoByID($id_lanche)['preco'];
                    }
                    $conM = new compra();

                    $checarexiste = $conp->checarExisteLanche($id_lanche, $idCliente);
                    if ($checarexiste) {
                        $getQtd = $conp->getQtdLanche($id_lanche, $idCliente)[0];
                        if ($getQtd) {
                            $adicionarLancheQtd = $conM->addQtdLanche($getQtd, $qntd, $id_lanche, $idCliente);
                            if ($adicionarLancheQtd == 1) {
                                $msg = "Lanches Adicionados no carrinho com sucesso!";
                            }
                        }
                    } else {

                        $adicionarLanche = $conM->addLancheWithQtd($qntd, $precoLanche, $id_lanche, $idCliente);

                        if ($adicionarLanche == 1) {
                            $msg = "Lanches Adicionados no carrinho com sucesso!";
                        }
                    }
                }
            }

            $countI++;
        }

        if (!empty($msg)) {
            echo json_encode(array('successo' => $msg));
        } else {
            echo json_encode(array('error' => 'Nenhum item adicionado!'));
        }
    } else {
        echo json_encode(array('loginError' => 'Você não está logado!'));
    }
} else {
    echo json_encode(array('loginError' => 'Você não está logado!'));
}
