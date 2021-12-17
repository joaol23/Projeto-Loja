<?php
session_start();
if(!empty($_SESSION['logged'])){
    if($_SESSION['logged'] == true){
        $id = $_SESSION['id_user'];
        $con = new login();
        $listar = $con->getClienteByID($id);
    }
}
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
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <header>
        <a href="?page=home" class="logo">Moon<span>Burguer</span></a>
        <?php
        if(!empty($listar['nome'])){
            ?>
        <div class="LoginMenu">
            <div class="login">
                <span>Logado como: </span>
                <?= $listar['nome'] ?>
            </div>
        <span class="setinha-home"></span>
            <div class='slideMenuLogin'>
                <ul class="slideLogin">
                    <a href="?page=formusu"><li class="cadaSlideLogin">Editar Conta</li></a>
                    <a href="?page=carrinho"><li class="cadaSlideLogin">Carrinho</li></a>
                    <li class="cadaSlideLogin btnLeave">Sair</li>
                </ul>
            </div>
        </div>
        <?php
    }
        ?>
        <div class="menuToggle" onclick="toglleMenu()"></div>
        <ul class="navegation">
            <li><a href="#banner">Início</a></li>
            <li><a href="#about">Sobre Nós</a></li>
            <li><a href="#menu">Menu</a></li>
            <li><a href="#contato">Contato Moon</a></li>
            <li><a href="?page=forms">Login/Cadastro</a></li>
        </ul>
    </header>


    <section id="banner" class="banner">
        <div class="content">
            <h2>Sempre escolha bem!</h2>
            <p> </p>
            <a href="?page=menu" class="btn">Nosso menu</a>
        </div>
    </section>

    <section class="about " id="about">
        <div class="row">
            <div class="col50">
                <h2 class="titleText"><span>S</span>obre nós</h2>
                <p>Somos um restaurante especializado e focado somente em diversos tipos de sanduiches com diversas
                    opções de recheios especialmente para o cliente!!
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
                    <img title="<?= $value['descricao'] ?>" src="<?= $value['img'] ?>"
                        alt="<?= $value['nome'] ?> - Foto">
                </div>
                <div class="text">
                    <h3>
                        <?= $value['nome'] ?>
                    </h3>
                </div>
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

    <script src='js/scriptHome.js'></script>
    <script type="text/javascript">
        window.addEventListener('scroll', function () {
            const header = document.querySelector('header');
            header.classList.toggle("sticky", window.scrollY > 0)
        });

        function toglleMenu() {
            const menu = document.querySelector('.menuToggle');
            const navegation = document.querySelector('.navegation')
            menu.classList.toggle('active');
            navegation.classList.toggle('active');
        }
    </script>
</body>

</html>