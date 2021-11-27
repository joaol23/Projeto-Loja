<?php
require_once 'classes/APP/lanches.php';

$conp = new lanches();
$listarp = $conp->getLanches();
?>
<!DOCTYPE html>
<link rel="shortcut icon" href="Logo.jpg"
    type="image/x-icon">
<head>
    <meta charset="UTF-8">    
    <title>MoonBurguer</title>
    <link rel="stylesheet" type="text/css" href="css/estilo_menu.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MoonBurguer</title> 
    <link rel="shortcut icon" href="imagens/Logo.jpg" type="image/x-icon">        
</head>
<body>
    
        <div id="menu">
            <ul class="listaMenu">                
                <li><a href="#">Dúvidas</a></li>
                <li><a id="menuAtual" href="#">Promoções</a></li>
                <li><a href="#"> Suporte</a></li>
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
                <table>
                    <tr>
                    <?php $i =1;
                    foreach($listarp as $value){
                        ?>
                        <td>
                            <p class="tituloProduto"><?=$value['nome']?></p>
                            <img src="<?= $value['img'] ?>">                                
                            <p class="precoProduto">R$<?= $value['preco'] ?></p>
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
            </div>
        </div>        
    </div>

    <div id="entrega">
        <div id="tel">
            <a href="tel:1111111111"><h4>(11) 1111-1111</h4></a>
            <h5>Nosso Whatsapp</h5>
        </div>
        <img src="imagens/Logo.jpg" height="100"> 
    </div>
    <a href="home.php"><button class="btn-voltar">Voltar</button></a>
</body>
</body>
</html>