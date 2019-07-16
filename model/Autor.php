<?php

class Autor {

    private $id;
    private $NomeAutor;
    private $Descricao;



    public function getId() {
        return $this->id;
    }
    public function getNomeAutor() {
        return $this->NomeAutor;
    }
    public function getDescricao() {
        return $this->Descricao;
    }
    public function getImg() {
        return $this->Img;
    }
    



    public function setId($id) {
        $this->id = $id;
    }
    public function setNomeAutor($NomeAutor) {
        $this->NomeAutor = $NomeAutor;
    }
    public function setDescricao($Descricao) {
        $this->Descricao = $Descricao;
    }
    public function setImg($Img) {
        $this->Img = $Img;
    }

}