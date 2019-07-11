<?php

class Cliente {

    private $id;
    private $Nome;
    private $Sobrenome;
    private $CPF;
    private $Dt_Nascimento;
    private $Telefone;
    private $Email;
    private $Senha;
    private $SenhaConf;
    private $SenhaHash;
    private $Token;
    private $Recaptcha; 


    public function getId() {
        return $this->id;
    }
    public function getNome() {
        return $this->Nome;
    }
    public function getSobrenome() {
        return $this->Sobrenome;
    }
    public function getCPF() {
        return $this->CPF;
    }
    public function getDt_Nascimento() {
        return $this->Dt_Nascimento;
    }
    public function getTelefone() {
        return $this->Telefone;
    }
    public function getEmail() {
        return $this->Email;
    }
    public function getSenha() {
        return $this->Senha;
    }
    public function getSenhaConf() {
        return $this->SenhaConf;
    }
    public function getSenhaHash() {
        return $this->SenhaHash;
    }
    public function getToken() {
        return $this->Token;
    }
    public function getRecaptcha() {
        return $this->Recaptcha;
    }



    public function setId($id) {
        $this->id = $id;
    }
    public function setNome($Nome) {
        $this->Nome = $Nome;
    }
    public function setSobrenome($Sobrenome) {
        $this->Sobrenome = $Sobrenome;
    }
    public function setCPF($CPF) {
        $this->CPF = $CPF;
    }
    public function setDt_Nascimento($Dt_Nascimento) {
        $this->Dt_Nascimento = $Dt_Nascimento;
    }
    public function setTelefone($Telefone) {
        $this->Telefone = $Telefone;
    }
    public function setEmail($Email) {
        $this->Email = $Email;
    }
    public function setSenha($Senha) {
        $this->Senha = $Senha;
    }
    public function setSenhaConf($SenhaConf) {
        $this->SenhaConf = $SenhaConf;
    }
    public function setSenhaHash($SenhaHash) {
        $this->SenhaHash = $SenhaHash;
    }
    public function setToken($Token) {
        $this->Token = $Token;
    }
    public function setRecaptcha($Recaptcha) {
        $this->Recaptcha = $Recaptcha;
    }


}
