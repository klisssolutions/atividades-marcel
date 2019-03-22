<?php
/*
    Projeto: Exercicio de MVC em tela de contato
    Autor: Igor
    Data Criação: 11/03/2019
    Data Modificação:
    Conteudo Modificação:
    Autor da Modificação:
    Objetivo da classe: CRUD da classe de Contatos
*/

class contatoDAO{

    private $conex;

    public function __construct(){
        //Import da classe do banco para todos os métodos
        require_once("conexaoMySQL.php");

        //Instancia da classe conexão
        $this->conex = new conexaoMySQL();
    }

    //Inserir um registro no banco de dados.
    public function insert(Contato $contato){
        $sql = "INSERT INTO tblcontatos
        (nome, email, telefone, celular, dataNascimento, obs)
        VALUES ('".$contato->getNome()."',
        '".$contato->getEmail()."',
        '".$contato->getTelefone()."',
        '".$contato->getCelular()."',
        '".$contato->getDataNascimento()."',
        '".$contato->getObs()."')";

        //Abrindo conexão com o BD
        $PDO_conex = $this->conex->connectDataBase();

        //Executa no BD o script Insert e retorna verdadeiro/falso
        if($PDO_conex->query($sql)){
            header("location:index.php");
        }else{
            echo("Erro de script");
        }

        //Fecha a conexão com o BD
        $this->conex->closeDataBase();
    }

    //Deletar um registro no banco de dados.
    public function delete($id){
        $sql = "DELETE FROM tblcontatos where codigo=".$id;

        //Abrindo conexão com o BD
        $PDO_conex = $this->conex->connectDataBase();

        //Executa no BD o script Insert e retorna verdadeiro/falso
        if($PDO_conex->query($sql)){
            header("location:index.php");
        }else{
            echo("Erro de script de delete");
        }

        //Fecha a conexão com o BD
        $this->conex->closeDataBase();
    }

    //Atualiza um registro no banco de dados.
    public function update(Contato $contato){
        $sql = "UPDATE tblcontatos
        SET nome = '".$contato->getNome()."',
            email = '".$contato->getEmail()."',
            telefone = '".$contato->getTelefone()."',
            celular = '".$contato->getCelular()."',
            dataNascimento = '".$contato->getDataNascimento()."',
            obs = '".$contato->getObs()."'
        WHERE codigo = '".$contato->getCodigo()."';";

        //Abrindo conexão com o BD
        $PDO_conex = $this->conex->connectDataBase();

        //Executa no BD o script Insert e retorna verdadeiro/falso
        if($PDO_conex->query($sql)){
            header("location:index.php");
        }else{
            echo("Erro de script");
            echo($sql);
        }

        //Fecha a conexão com o BD
        $this->conex->closeDataBase();
    }

    //Lista todos os registros do banco de dados.
    public function selectAll(){
        $sql = "SELECT * FROM tblcontatos ORDER BY codigo DESC";

        //Abrindo conexão com o BD
        $PDO_conex = $this->conex->connectDataBase();

        //executa o script de select no bd
        $select = $PDO_conex->query($sql);


        $cont = 0;
        define("UM", 1);
        /* $select->fetch no formado pdo retorna os dados do BD
        também retorna com característica do PDO como o fetch
        é necessário especificar o modelo de conversão.
        EX: PDO::FETCH_ASSOC, PDO::FETCH_ARRAY etc. */
        while($rscontatos=$select->fetch(PDO::FETCH_ASSOC)){
            $listContatos[] = new Contato();
            $listContatos[$cont]->setCodigo($rscontatos["codigo"]);
            $listContatos[$cont]->setNome($rscontatos["nome"]);
            $listContatos[$cont]->setEmail($rscontatos["email"]);
            $listContatos[$cont]->setTelefone($rscontatos["telefone"]);
            $listContatos[$cont]->setCelular($rscontatos["celular"]);
            $listContatos[$cont]->setDataNascimento($rscontatos["dataNascimento"]);
            $listContatos[$cont]->setObs($rscontatos["obs"]);
            
            
            $valorCont = $cont;
            $cont = $valorCont + UM;
        }

        $this->conex->closeDataBase();

        return($listContatos);

    }

    //Seleciona um registro pelo ID.
    public function selectById($id){
        $sql = "SELECT * FROM tblcontatos WHERE codigo=".$id;

        //Abrindo conexão com o BD
        $PDO_conex = $this->conex->connectDataBase();

        //executa o script de select no bd
        $select = $PDO_conex->query($sql);

        /* $select->fetch no formado pdo retorna os dados do BD
        também retorna com característica do PDO como o fetch
        é necessário especificar o modelo de conversão.
        EX: PDO::FETCH_ASSOC, PDO::FETCH_ARRAY etc. */
        if($rscontatos=$select->fetch(PDO::FETCH_ASSOC)){
            $listContatos = new Contato();
            $listContatos->setCodigo($rscontatos["codigo"]);
            $listContatos->setNome($rscontatos["nome"]);
            $listContatos->setEmail($rscontatos["email"]);
            $listContatos->setTelefone($rscontatos["telefone"]);
            $listContatos->setCelular($rscontatos["celular"]);
            $listContatos->setDataNascimento($rscontatos["dataNascimento"]);
            $listContatos->setObs($rscontatos["obs"]);
        }

        $this->conex->closeDataBase();

        return($listContatos);
    }
}
?>