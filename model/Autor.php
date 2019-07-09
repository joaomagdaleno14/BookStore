<?php

class Autor {

    private $id;
    private $Nome;
    private $Descricao;



    public function getId() {
        return $this->id;
    }
    public function getNome() {
        return $this->Nome;
    }
    public function getDescricao() {
        return $this->Descricao;
    }
    



    public function setId($id) {
        $this->id = $id;
    }
    public function setNome($Nome) {
        $this->Nome = $Nome;
    }
    public function setDescricao($Descricao) {
        $this->Descricao = $Descricao;
    }

}