<?php
require_once 'classes/APP/login.php';
require_once 'classes/APP/lanches.php';
$id = filter_input(INPUT_GET,'cliente',FILTER_SANITIZE_STRING);

$con = new login();
$listar = $con->getClienteByID($id);

$conLanche = new lanches();
$listarLanche = $conLanche->getLanchesDestaque();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MoonBurguer</title>
    <link rel="shortcut icon" href="imagens/Logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="css/estilo_2.css">
</head>
<body>
    <header >
        <a href="#" class="logo">Moon<span>Burguer</span></a>
        <?php
        if(!empty($listar['nome'])){
        echo '<div class="login"><span>Logado como: </span>'. $listar['nome'] .'</div>';
    }
        ?>
        <div class="menuToggle" onclick="toglleMenu()" ></div>  
        <ul class="navegation">
            <li><a href="#banner">Início</a></li>
            <li><a href="#about" >Sobre Nós</a></li>
            <li><a href="#menu" >Menu</a></li>
            <li><a href="#contato" >Contato Moon</a></li>
            <li><a href="forms.php" >Login/Cadastro</a></li>
        </ul>
    </header>

    <section id="banner" class="banner">
        <div class="content">
            <h2>Sempre escolha bem!</h2>
            <p> </p>
            <a href="menu.php<?= $listar['id'] ? '?cliente='. $listar['id'] : '' ?>" class="btn">Nosso menu</a>
        </div>
    </section>

    <section class="about " id="about">
        <div class="row">
            <div class="col50">
                <h2 class="titleText"><span>S</span>obre nós</h2>
                <p>Somos um restaurante especializado e focado somente em diversos tipos de sanduiches com diversas opções de recheios especialmente para o cliente!!
                </p>
            </div>
            <div class="col50">
                <div class="imgBx">
                    <img src="imagens/foto.jpg">
                </div>
            </div>
        </div>
    </section>

    <section class="menu" id="menu">
        <div class="title">
            <h2 class="titleText">Nosso<span> M</span>enu</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>

        </div>
        <div class="content">
            <?php 
                foreach($listarLanche as $value){
                    ?>
            <div class="box">
                <div class="ImgBx">
                    <img src="<?= $value['img'] ?>" alt="<?= $value['nome'] ?> - Foto">
                </div>
                <div class="text">
                    <h3><?= $value['nome'] ?></h3>
                </div>
                <img src="https://api.imgbb.com/1/imagens/bacon.jpg" alt="">
            </div>
            <?php } ?>
        </div>
        <div class="title">
            <a href="" class="btn">Ver Mais</a>

        </div>
    </section>
        <section class="contact" id="contato">
        <div class="title">
            <h2 class="titleText"><span>C</span>ontate-nos</h2>
            <p>A MoonBurguer estará sempre pronta para atender qualquer dúvida.</p>
        </div>
        <div class="contactForm">
            <h3>Enviar Mensagem</h3>
            <div class="inputBox">
                <input type="text" name="Name" placeholder="Nome">
            </div>
            <div class="inputBox">
                <input type="text" name="Email" placeholder="email">
            </div>

            <div class="inputBox">
                <textarea placeholder="Mensagem">

                </textarea>
            </div>
            <div class="inputBox">
                <input type="submit" value="Enviar">
            </div>
        </div>
    </section>

    
    <script type="text/javascript">
    window.addEventListener('scroll',function(){
        const header = document.querySelector('header');
        header.classList.toggle("sticky",window.scrollY>0)
    });
    function toglleMenu(){
        const menu = document.querySelector('.menuToggle');
        const navegation = document.querySelector('.navegation')
        menu.classList.toggle('active');
        navegation.classList.toggle('active');
    }
    </script>
</body>
</html>