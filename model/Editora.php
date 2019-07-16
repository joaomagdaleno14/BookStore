<?php

class Editora {

    private $id;
    private $NomeEditora;
    private $Img;



    public function getId() {
        return $this->id;
    }
    public function getNomeEditora() {
        return $this->NomeEditora;
    }
    public function getImg() {
        return $this->Img;
    }


    public function setId($id) {
        $this->id = $id;
    }
    public function setNomeEditora($NomeEditora) {
        $this->NomeEditora = $NomeEditora;
    }
    public function setImg($Img) {
        $this->Img = $Img;
    }


}
