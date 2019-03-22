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

    //Atributo do tipo objeto para ser instanciado no construtor e ser usado por todos
    private $contatoDAO;

    public function __construct(){
        //Import da classe contato
        require_once("model/contatoClass.php");

        //Import da classe contatoDAO, para inserir no BD
        require_once("model/DAO/contatoDAO.php");

        //Instancia do DAO criado para ser usado em todos os outros métodos
        $this->contatoDAO = new contatoDAO();
    }

    public function inserirContato(){
        //Verifica qual metodo esta sendo requisitado do formulario(POST ou GET)
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

            /* Chamada para o metodo de inserir no BD, passando como parâmetro o objeto
            contatoClass que tem todos os dados que serão inseridos no banco de dados */
            $this->contatoDAO->insert($contatoClass);
        }
    }

    public function excluirContato(){
        //Esse id foi enviado pela view no href, o arquivo de rota é quem chamou este método
        $id = $_GET["id"];

        //Chamada para o método de excluir um contato
        $this->contatoDAO->delete($id);
    }

    public function atualizarContato(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $codigo = $_GET["id"];
            $nome = $_POST["txtnome"];
            $telefone = $_POST["txttelefone"];
            $celular = $_POST["txtcelular"];
            $email = $_POST["txtemail"];
            $dataNascimento = $_POST["txtdatanascimento"];
            $obs = $_POST["txtobs"];

            //Instancia da classe
            $contatoClass = new Contato();

            //Guardando os dados do post no objeto da classe
            $contatoClass->setCodigo($codigo);
            $contatoClass->setNome($nome);
            $contatoClass->setTelefone($telefone);
            $contatoClass->setCelular($celular);
            $contatoClass->setEmail($email);
            $contatoClass->setDataNascimento($dataNascimento);
            $contatoClass->setObs($obs);

            /* Chamada para o metodo de inserir no BD, passando como parâmetro o objeto
            contatoClass que tem todos os dados que serão inseridos no banco de dados */
            $this->contatoDAO->update($contatoClass);
        }
    }

    public function listarContato(){        
        return($this->contatoDAO->selectAll());
    }

    public function buscarContato(){
        $id = $_GET["id"];
        return $this->contatoDAO->selectById($id);
    }
}
?>