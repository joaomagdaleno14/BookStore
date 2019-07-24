<?php

class Editora {

    private $id;
    private $NomeEditora;
    private $Editora_Img;



    public function getId() {
        return $this->id;
    }
    public function getNomeEditora() {
        return $this->NomeEditora;
    }
    public function getEditora_Img() {
        return $this->Editora_Img;
    }


    public function setId($id) {
        $this->id = $id;
    }
    public function setNomeEditora($NomeEditora) {
        $this->NomeEditora = $NomeEditora;
    }
    public function setEditora_Img($Editora_Img) {
        $this->Editora_Img = $Editora_Img;
    }


}
