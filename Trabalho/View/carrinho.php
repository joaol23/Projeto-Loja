<?php

session_start();
if (!empty($_SESSION['logged'])) {
    if ($_SESSION['logged'] == true) {
        $con = new login();
        $listar = $con->getClienteByID($_SESSION['id_user']);
    }

    $conC = new compra();
    $listarp = $conC->getItensCarrinho($_SESSION['id_user']);
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
    <div id="contentCar">
        <div id="maisVendidos">
            <h1 id="tituloConteudo" class="tituloCompra">Seu Carrinho de Compras</h1>
            <h2 class="nomeTitulo">Cliente: <?= $listar['nome'] ?></h2>
            <?php
                if($listarp){
                ?>
            <div id="areaCarrinho">
                <table border='1'>
                    <tr>
                        <td>Lanche:</td>
                        <td>Preço unidade:</td>
                        <td>Descrição:</td>
                        <td>Quantidade:</td>
                    </tr>
                    <?php
                        foreach ($listarp as $value) {
                            ?>
                    <tr class="tdLanches">
                        <td><?= $value['nomeLanche'] ?></td>
                        <td>R$ <?= $value['precoCada'] ?></td>
                        <td><?= $value['descLanche'] ?></td>
                        <td width='100'><?= $value['lanchesQtd'] ?></td>
                    </tr>
                    <?php
                            }
                    ?>
                </table>
                <div class="div_btn">
                    <button type="button" class="button_menu btn_carr">Comprar</button>
                </div>
            </div>
            <?php
                } else {
                ?>
            <div class="carrinho-erro">
                Nada no carrinho. <a href="?page=menu">MENU</a>
            </div>
            <?php 
                }
                ?>
        </div>
    </div>
    <script src='js/ajax3.js'></script>
</body>

</html>
<?php
} else {
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
        <div id="maisVendidos">
            <h1 id="tituloConteudo">Você não está Logado!</h1>
            <div id="areaProdutos">
                <div class="div_btn">
                    <a href="?page=forms"><button class="button_menu">Logar</button></a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>



<?php

}