<?php
require_once 'config.php';

session_start();
if (!empty($_SESSION['logged'])) {
    $con = new compra();
    $listarp = $con->deleteCarrinho($_SESSION['id_user']);

}
