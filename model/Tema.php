<?php

class Tema {

    private $id;
    private $NomeTema;


    public function getId() {
        return $this->id;
    }
    public function getNomeTema() {
        return $this->NomeTema;
    }


    public function setId($id) {
        $this->id = $id;
    }
    public function setNomeTema($NomeTema) {
        $this->NomeTema = $NomeTema;
    }


}
