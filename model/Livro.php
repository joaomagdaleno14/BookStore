<?php

class Livro {

    private $id;
    private $Nome;
    private $Ano_Publi;
    private $Preco;
    private $Descricao;
    private $ID_Editora;
    private $Email;
    private $Senha;


    public function getId() {
        return $this->id;
    }
    public function getNome() {
        return $this->Nome;
    }
    public function getAno_Publi() {
        return $this->Ano_Publi;
    }
    public function getPreco() {
        return $this->Preco;
    }
    public function getDescricao() {
        return $this->Descricao;
    }
    public function getID_Editora() {
        return $this->ID_Editora;
    }
    



    public function setId($id) {
        $this->id = $id;
    }
    public function setNome($Nome) {
        $this->Nome = $Nome;
    }
    public function setAno_Publi($Ano_Publi) {
        $this->Ano_Publi = $Ano_Publi;
    }
    public function setPreco($Preco) {
        $this->Preco = $Preco;
    }
    public function setDescricao($Descricao) {
        $this->Descricao = $Descricao;
    }
    public function setID_Editora($ID_Editora) {
        $this->ID_Editora = $ID_Editora;
    }

}