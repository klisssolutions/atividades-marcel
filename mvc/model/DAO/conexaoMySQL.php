<?php
/*
    Projeto: Exercicio de MVC em tela de contato
    Autor: Igor
    Data Criação: 11/03/2019
    Data Modificação:
    Conteudo Modificação:
    Autor da Modificação:
    Objetivo da classe: Criar a conexão com o BD MySQL
*/
class conexaoMySQL{
    private $server;
    private $user;
    private $password;
    private $database;

    public function __construct(){
        $this ->server = "localhost";
        $this ->user = "root";
        $this ->password = "bcd127";
        $this ->database = "dbusuario";
    }

    //Abre conexão com o BD
    public function connectDataBase(){
        try{
            $conexao = new PDO("mysql:host=".$this->server.";dbname=".$this->database, $this->user,$this->password, null);

            return $conexao;
        }catch(PDOException $erro){
            echo("Erro ao tentar a conexão com o banco de dados.<br>
                Linha:".$erro->getLine()."<br>
                Mensagem:".$erro->getMessage()
            );
        }
    }

    //Fecha conexão com o BD
    public function closeDataBase(){
        //Pode usar um dos dois para fechar a conexao
        $conexao = null;
        //Destró a variavel
        unset($conexao);
    }
}
?>