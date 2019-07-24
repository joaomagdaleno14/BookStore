<?php

class Livro {

    private $id;
    private $NomeLivro;
    private $Ano_Publi;
    private $Preco;
    private $Descricao;
    private $ID_Editora;
    private $ID_Autor;
    private $Livro_Img;


    public function getId() {
        return $this->id;
    }
    public function getNomeLivro() {
        return $this->NomeLivro;
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
    public function getID_Autor() {
        return $this->ID_Autor;
    }
    public function getLivro_Img() {
        return $this->Livro_Img;
    }

    



    public function setId($id) {
        $this->id = $id;
    }
    public function setNomeLivro($NomeLivro) {
        $this->NomeLivro = $NomeLivro;
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
    public function setID_Autor($ID_Autor) {
        $this->ID_Autor = $ID_Autor;
    }
    public function setLivro_Img($Livro_Img) {
        $this->Livro_Img = $Livro_Img;
    }

}