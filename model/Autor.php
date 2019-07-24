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
    public function getAutor_Img() {
        return $this->Autor_Img;
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
    public function setAutor_Img($Autor_Img) {
        $this->Autor_Img = $Autor_Img;
    }

}