<?php
/*
    Projeto: Exercicio de MVC em tela de contato
    Autor: Igor
    Data Criação: 11/03/2019
    Data Modificação:
    Conteudo Modificação:
    Autor da Modificação:
    Objetivo da classe: Controller de Contatos
*/

class controllerContato{
    public function __construct(){ }

    public function inserirContato(){
        //Verifica qual metodo esta sendo requisitado do formulatio(POST ou GET)
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $nome = $_POST["txtnome"];
            $telefone = $_POST["txttelefone"];
            $celular = $_POST["txtcelular"];
            $email = $_POST["txtemail"];
            $dataNascimento = $_POST["txtdatanascimento"];
            $obs = $_POST["txtobs"];

            require_once("model/contatoClass.php");

            $contatoClass = new Contato();

            $contatoClass->setNome($nome);
            $contatoClass->setTelefone($telefone);
            $contatoClass->setCelular($celular);
            $contatoClass->setEmail($email);
            $contatoClass->setDataNascimento($dataNascimento);
            $contatoClass->setObs($obs);
        }
    }

    public function excluirContato(){

    }

    public function atualizarContato(){

    }

    public function listarContato(){

    }

    public function buscarContato(){
        
    }
}
?>