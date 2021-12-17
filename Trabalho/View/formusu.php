<?php
session_start();
if(!empty($_SESSION['logged'])){
    if($_SESSION['logged'] == true){
        $id = $_SESSION['id_user'];
        $con = new login();
        $listar = $con->getClientAll($id);
    }
}
// var_dump(explode(',',$listar['endereco']));die;

$estado = explode(',',$listar['endereco'])[0];
$localizacao = trim(explode(',',$listar['endereco'])[1]);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MoonBurguer</title>
    <link rel="shortcut icon" href="imagens/Logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="css/estilo_2.css">
    <link rel="stylesheet" href="css/estilo_form.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <header class="headerFormusu">
        <a href="?page=home" class="logo">Moon<span>Burguer</span></a>
    </header>

    <div class="wrap-content marginTop">
        <div class="signup_blockLog">
            <div class="container">
                <form action="" method="POST" id="atualizaForm">
                    <fieldset>
                        <legend>Informações Pessoais</legend>
                        <label for="nameReg">Nome Completo*</label>
                        <input type="text" id="nameReg" name="nameReg" class="input"
                            placeholder="Exemplo: Caio Trevisani" required
                        value="<?= !empty($listar['nome']) ? $listar['nome'] : '' ?>">
                        <label for="emailReg">Email*</label>
                        <input type="email" id="emailReg" name="emailReg" class="input"
                            placeholder="Exemplo: email@gmail.com" required
                            value="<?= !empty($listar['email']) ? $listar['email'] : '' ?>">
                        <label for="stateReg">Estado*: </label>
                        <select name="stateReg" id="stateReg" class="select" value='Minas Gerais' required>
                            <option value="<?= !empty($estado) ? $estado : '' ?>"><?= !empty($estado) ? $estado : 'Escolha um estado' ?></option>
                            <option value="Minas Gerais">Minas Gerais</option>
                            <option value="São Paulo">São Paulo</option>
                            <option value="Rio de Janeiro">Rio de Janeiro</option>
                            <option value="Goiás">Goiás</option>
                            <option value="Destrito Federal">Destrito Federal</option>
                            <option value="Espírito Santo">Espírito Santo</option>
                            <option value="Bahia">Bahia</option>
                            <option value="Santa Catarina">Santa Catarina</option>
                            <option value="Paraná">Paraná</option>
                            <option value="Rio Grande do Sul">Rio Grande do Sul</option>
                            <option value="Rio Grande do Norte">Rio Grande do Norte</option>
                            <option value="Ceará">Ceará</option>
                            <option value="Pernambuco">Pernambuco</option>
                            <option value="Amazonas">Amazonas</option>
                            <option value="Pará">Pará</option>
                            <option value="Maranhão">Maranhão</option>
                            <option value="Piauí">Piauí</option>
                            <option value="Paraíba">Paraíba</option>
                            <option value="Sergipe">Sergipe</option>
                            <option value="Mato Grosso">Mato Grosso</option>
                            <option value="Mato Grosso do Sul">Mato Grosso do Sul</option>
                            <option value="Rondônia">Rondônia</option>
                            <option value="Alagoas">Alagoas</option>
                            <option value="Tocantins">Tocantins</option>
                            <option value="Roraima">Roraima</option>
                            <option value="Acre">Acre</option>
                        </select>
                        <label for="enderecoReg">Endereço* </label>
                        <input type="text" id="enderecoReg" name="enderecoReg" class="input" required
                        value="<?= !empty($localizacao) ? $localizacao : '' ?>">
                        <label for="telefoneReg">Telefone*</label>
                        <input type="tel" id="telefoneReg" oninput=mascara_telefone() name="telefoneReg" class="input"
                            required maxlength="14" value="<?= !empty($listar['telefone']) ? $listar['telefone'] : '' ?>">
                        <label for="cepReg">Cep*</label>
                        <input type="text" id="cepReg" name="cepReg" class="input" oninput=mascara_cep() required
                            maxlength="10" value="<?= !empty($listar['cep']) ? $listar['cep'] : '' ?>">
                        <label for="senhaReg">Senha* </label>
                        <input type="password" id="senhaReg" name="senhaReg" class="input" required>
                        <label for="senhaRegConfirm">Confirme sua senha* </label>
                        <input type="password" id="senhaRegConfirm" name="senhaRegConfirm" class="input" required>
                        <input type="button" value="ATUALIZAR" class="input" id="btn-atualizar">
                    </fieldset>


                </form>
                <div id="resultadoReg"></div>
            </div>
        </div>
    </div>
    
    <script src='js/scriptUsu.js'></script>
    <script>
    function mascara_telefone() {
        //limitador
        var tel = document.getElementById("telefoneReg").value
        console.log(tel)
        tel = tel.slice(0, 14) //(pode limitar a quantidade de char na entrada pelo java script)
        console.log(tel)
        document.getElementById("telefoneReg").value = tel
        tel = document.getElementById("telefoneReg").value.slice(0, 10)
        console.log(tel)

        //máscara
        var tel_formatado = document.getElementById("telefoneReg").value
        if (tel_formatado[0] != "(") {
            if (tel_formatado[0] != undefined) {
                document.getElementById("telefoneReg").value = "(" + tel_formatado[0];
            }
        }

        if (tel_formatado[3] != ")") {
            if (tel_formatado[3] != undefined) {
                document.getElementById("telefoneReg").value = tel_formatado.slice(0, 3) + ")" + tel_formatado[3]
            }
        }

        if (tel_formatado[9] != "-") {
            if (tel_formatado[9] != undefined) {
                document.getElementById("telefoneReg").value = tel_formatado.slice(0, 9) + "-" + tel_formatado[9]
            }
        }
    }

    function mascara_cep() {
        var cep_formatado = document.getElementById("cepReg").value

        if (cep_formatado[6] != "-") {
            if (cep_formatado[6] != undefined) {
                document.getElementById("cepReg").value = cep_formatado.slice(0, 6) + "-" + cep_formatado[6]
            }
        }

    }

    //      function moeda(z){
    //            v = z.value; onkeyup=moeda(this)
    //
    //           v=v.replace(/\D/g,"") // permite digitar apenas numero
    //          z.value = v;
    //    }
    </script>
</body>