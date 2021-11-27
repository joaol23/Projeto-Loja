<?php
// class é uma estrutura de um objeto contendo atributos e metodos

class model
{
    //atributos
    //precisa de 4 atributos -> servidor / banco / usuario / senha
    //visibilidade -> private / public
    private $server = "boaventura.mysql.dbaas.com.br";
    private $bd = "boaventura";
    private $user = "boaventura";
    private $password = "orombas2021";
    private $conn = ""; //variavel que vai receber a conexão com o banco



    //metodos -> ações
    public function __construct()
    {
        //executado toda vez que criamos uma instancia da classe
        try{ // bloco para validar a execução no código
            // criar uma conexao com a class pdo
            $this->conn = new PDO("mysql:host={$this->server};
            dbname={$this->bd};
            charset=utf8",$this->user,$this->password);

        }catch (PDOException $msg){
            echo "Não foi possível conectar com o servidor: " . $msg->getMessage();
        }
    }

    // metodo para executar insert / update / delete
    public function executeQuery($comando){
        try {
            //variavel pra receber comando sql
            $sql = $this->conn->prepare($comando);
            //executar o comando no servidor
            $sql->execute();
            //testar se o comando deu certo
            if($sql->rowCount() > 0){
                //devolver resultado do comando
                return '1';
            }else {
                //comando nao funcionou
                return $sql->errorInfo();
            }


        }catch (PDOException $msg){
            echo "Não foi possível executar o comando: " . $msg->getMessage();
        }

    }

    // metodo para executar select
    public function executeSelect($comando){
        try{
            //variavel para receber o comando sql
            $sql = $this->conn->prepare($comando);
            //executar comando no servidor
            $sql->execute();
            //testar se o comando deu certo
            if ($sql->rowCount() > 0){
                //retornar os dados para a tela
                return $sql->fetchAll(PDO::FETCH_ASSOC);
                //fetch class -> retornar linha/coluna formato class
                // alunos -> nome
                //fletch assor -> retornar linha/coluna formato vetor
                //aluno["nome"]
            }else{
                return $sql->errorInfo();
            }

        }catch (PDOException $msg){
            echo "Não foi possivel executar a consulta" . $msg->getMessage();
        }
    }
}