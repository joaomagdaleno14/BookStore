<?php

include_once './Paciente.php';

class Consulta {

    private $id;
    private $NomeDent;
    private $Data;
    private $Situacao;
    private $paciente;

    function __construct() {
        $this->paciente = new Paciente();
    }

    public function getId() {
        return $this->id;
    }
    public function getNomeDent() {
        return $this->NomeDent;
    }
    public function getData() {
        return $this->Data;
    }
    public function getTratamento() {
        return $this->Tratamento;
    }
    public function getSituacao() {
        return $this->Situacao;
    }


    public function setId($id) {
        $this->id = $id;
    }
    public function setNomeDent($NomeDent) {
        $this->NomeDent = $NomeDent;
    }
    public function setData($Data) {
        $this->Data = $Data;
    }
    public function setTratamento($Tratamento) {
        $this->Tratamento = $Tratamento;
    }
    public function setSituacao($Situacao) {
        $this->Situacao = $Situacao;
    }
}
