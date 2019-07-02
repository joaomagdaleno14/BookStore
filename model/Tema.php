<?php

class Tema {

    private $id;
    private $Nome;


    public function getId() {
        return $this->id;
    }
    public function getNome() {
        return $this->Nome;
    }


    public function setId($id) {
        $this->id = $id;
    }
    public function setNome($Nome) {
        $this->Nome = $Nome;
    }


}
