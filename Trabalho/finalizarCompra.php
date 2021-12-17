<?php
require_once 'config.php';

session_start();
if (!empty($_SESSION['logged'])) {

    $con = new compra();
    $listarp = $con->getprecoCarrinho($_SESSION['id_user']);

    echo json_encode($listarp);
}
