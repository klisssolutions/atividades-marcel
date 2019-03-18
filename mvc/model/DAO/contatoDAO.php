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
    public function __construct(){
        //Import da classe do banco para todos os métodos
        require_once("conexaoMySQL.php");
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

        //Instancia a classe de conexao
        $conex = new conexaoMySQL();

        //Abrindo conexão com o BD
        $PDO_conex = $conex->connectDataBase();

        //Executa no BD o script Insert e retorna verdadeiro/falso
        if($PDO_conex->query($sql)){
            header("location:index.php");
        }else{
            echo("Erro de script");
        }

        //Fecha a conexão com o BD
        $conex->closeDataBase();
    }

    //Deletar um registro no banco de dados.
    public function delete(){

    }

    //Atualiza um registro no banco de dados.
    public function update(){

    }

    //Lista todos os registros do banco de dados.
    public function selectAll(){
        $sql = "SELECT * FROM tblcontatos ORDER BY codigo DESC";

        //Instancia a classe de conexao
        $conex = new conexaoMySQL();

        //Abrindo conexão com o BD
        $PDO_conex = $conex->connectDataBase();

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
            $listContatos[$cont]->setNome($rscontatos["nome"]);
            $listContatos[$cont]->setEmail($rscontatos["email"]);
            $listContatos[$cont]->setTelefone($rscontatos["telefone"]);
            $listContatos[$cont]->setCelular($rscontatos["celular"]);
            $listContatos[$cont]->setDataNascimento($rscontatos["dataNascimento"]);
            $listContatos[$cont]->setObs($rscontatos["obs"]);
            
            
            $valorCont = $cont;
            $cont = $valorCont + UM;
        }

        $conex->closeDataBase();

        return($listContatos);

    }

    //Seleciona um registro pelo ID.
    public function selectById(){

    }
}
?>