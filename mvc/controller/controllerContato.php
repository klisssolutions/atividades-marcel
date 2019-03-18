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
    public function __construct(){
        //Import da classe contato
        require_once("model/contatoClass.php");

        //Import da classe contatoDAO, para inserir no BD
        require_once("model/DAO/contatoDAO.php");
    }

    public function inserirContato(){
        //Verifica qual metodo esta sendo requisitado do formulatio(POST ou GET)
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $nome = $_POST["txtnome"];
            $telefone = $_POST["txttelefone"];
            $celular = $_POST["txtcelular"];
            $email = $_POST["txtemail"];
            $dataNascimento = $_POST["txtdatanascimento"];
            $obs = $_POST["txtobs"];

            //Instancia da classe
            $contatoClass = new Contato();

            //Guardando os dados do post no objeto da classe
            $contatoClass->setNome($nome);
            $contatoClass->setTelefone($telefone);
            $contatoClass->setCelular($celular);
            $contatoClass->setEmail($email);
            $contatoClass->setDataNascimento($dataNascimento);
            $contatoClass->setObs($obs);
            
            //Instancia da classe contatoDAO, essa classe é responsável por manipular o CRUD no BD
            $contatoDAO = new contatoDAO();

            /* Chamada para o metodo de inserir no BD, passando como parâmetro o objeto
            contatoClass que tem todos os dados que serão inseridos no banco de dados */
            $contatoDAO -> insert($contatoClass);
        }
    }

    public function excluirContato(){

    }

    public function atualizarContato(){

    }

    public function listarContato(){
        $listContatoDAO = new contatoDAO();
        
        return($listContatoDAO->selectAll());
    }

    public function buscarContato(){
        
    }
}
?>