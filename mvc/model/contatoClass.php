<?php
/*
    Projeto: Exercicio de MVC em tela de contato
    Autor: Igor
    Data Criação: 11/03/2019
    Data Modificação:
    Conteudo Modificação:
    Autor da Modificação:
    Objetivo da classe: Classe de Contatos
*/
class Contato{
    private $codigo;
    private $nome;
    private $email;
    private $telefone;
    private $celular;
    private $dataNascimento;
    private $obs;

    public function __construct(){
        
    }

    public function getCodigo(){
        return $this->codigo;
    }

    public function setCodigo($codigo){
        $this->codigo = $codigo;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getTelefone(){
        return $this->telefone;
    }
 
    public function setTelefone($telefone){
        $this->telefone = $telefone;
    }

    public function getCelular(){
        return $this->celular;
    }

    public function setCelular($celular){
        $this->celular = $celular;
    }

    public function getDataNascimento(){
        return $this->dataNascimento;
    }

    public function setDataNascimento($dataNascimento){
        //Verifica se tem / na String
        if(strpos($dataNascimento, "/")){
            //strtotime converte string para data e date muda o formato da data
            $this->dataNascimento = date("Y-m-d", strtotime($dataNascimento));
        }else{
            //strtotime converte string para data e date muda o formato da data
            $this->dataNascimento = date("d/m/Y", strtotime($dataNascimento));
        }
    }

    public function getObs(){
        return $this->obs;
    }

    public function setObs($obs){
        $this->obs = $obs;
    }
}
?>