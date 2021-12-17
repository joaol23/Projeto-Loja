<?php

session_start();
if(!empty($_SESSION['logged'])){
    if($_SESSION['logged'] == true){
        $id = $_SESSION['id_user'];
        $con = new login();
        $listar = $con->getClienteByID($id);
    }
}

$conp = new lanches();
$listarp = $conp->getLanches();
?>
<!DOCTYPE html>
<link rel="shortcut icon" href="Logo.jpg" type="image/x-icon">

<head>
    <meta charset="UTF-8">
    <title>MoonBurguer</title>
    <link rel="stylesheet" type="text/css" href="css/estilo_menu.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MoonBurguer</title>
    <link rel="shortcut icon" href="imagens/Logo.jpg" type="image/x-icon">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <div id="menu">
        <ul class="listaMenu">
            <li><a id="menuAtual" href="?page=home">Página Inicial</a></li>
        </ul>
    </div>

    <div id="content">
        <div id="promotionBanner">
            <h1 id="promocaoH1">Promoção!</h1>
            <h2 id="promocaoValor">Moon Menu!</h1>
        </div>
        <div id="maisVendidos">
            <h1 id="tituloConteudo">Cardápio</h1>
            <div id="areaProdutos">
                <form action="" method="POST" id="menuForm">
                    <table>
                        <tr>
                            <?php $i =1;
                    foreach($listarp as $value){
                        ?>
                            <td>
                                <p class="tituloProduto"><?=$value['nome']?></p>
                                <img title="<?= $value['descricao'] ?>" src="<?= $value['img'] ?>">
                                <p class="precoProduto">R$<?= $value['preco'] ?></p>
                                <div class='cada_produto' data-id='<?= $value['id'] ?>'>
                                    <button type="button" class="btn_icone minus-<?= $value['id'] ?>">
                                        <span class="material-icons md-18">
                                            remove
                                        </span>
                                    </button>
                                    <input name="<?= $value['id'] ?>-qntd" min='0' type="text" value="0"
                                        class="input_menu getjs-<?= $value['id'] ?>" readonly>
                                    <input name="<?= $value['id'] ?>-id" min='0' type="text" value="<?= $value['id'] ?>"
                                        class="input_menu" style="display:none;" readonly>
                                    <button type="button" class="btn_icone add-<?= $value['id'] ?>">
                                        <span class="material-icons">
                                            add
                                        </span>
                                    </button>
                                </div>
                            </td>
                            <?php 
                        if($i % 3 == 0){
                            ?>
                        </tr>
                        <tr>
                            <?php
                        }
                        $i++;
                    }
                    ?>
                    </table>
                    <div class="div_btn">
                        <button type="button" class="button_menu">Adicionar ao carrinho</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="entrega">
        <div id="tel">
            <a href="tel:1111111111">
                <h4>(11) 1111-1111</h4>
            </a>
            <h5>Nosso Whatsapp</h5>
        </div>
        <img src="imagens/Logo.jpg" height="100">
    </div>
    <script src="js/script2.js"></script>
    <script src="js/ajax2.js"></script>
</body>

</html>
