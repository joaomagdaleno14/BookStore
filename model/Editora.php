<?php

class Editora {

    private $id;
    private $Nome;


    public function getId() {
        return $this->id;
    }
    public function getNome() {
        return $this->Nome;
    }
    public function getImg() {
        return $this->Img;
    }


    public function setId($id) {
        $this->id = $id;
    }
    public function setNome($Nome) {
        $this->Nome = $Nome;
    }
    public function setImg($Img) {
        $this->Img = $Img;
    }


}
