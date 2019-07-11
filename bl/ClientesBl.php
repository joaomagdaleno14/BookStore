<?php

include_once '../model/Cliente.php';
include_once '../common/respostas.php';
include_once '../dao/ClienteDao.php';
class ClienteBl {
    
    private $ClienteDao = null;
    
    function __construct() {
        $this->ClienteDao = new ClienteDao();
    }

    #Faz a validação dos campos no cadastro
    public function registrarCliente(Cliente $Cliente){        
        if ($Cliente->getNome() == null || 
                $Cliente->getNome() == "") {
            throw new InvalidArgumentException(""
                    . "O nome do Cliente esta em branco");
        }
        if ($Cliente->getSobrenome() == null || 
                $Cliente->getSobrenome() == "") {
            throw new InvalidArgumentException(""
                    . "O Sobrenome do Cliente esta em branco");
        }

        if ($Cliente->getCPF() == null || 
                $Cliente->getCPF() == "") {
            throw new InvalidArgumentException(""
                    . "A data de nascimento do Cliente esta em branco");
        }

        if ($Cliente->getDt_Nascimento() == null || 
                $Cliente->getDt_Nascimento() == "") {
            throw new InvalidArgumentException(""
                    . "O endereço do Cliente esta em branco");
        }

        if ($Cliente->getTelefone() == null || 
                $Cliente->getTelefone() == "") {
            throw new InvalidArgumentException(""
                    . "O e-mail do Cliente esta em branco");
        }

        return $this->ClienteDao->inserir($Cliente);
    }

    public function validarSenha(Cliente $Validate){
        if ($Validate->getSenha() == null || 
        $Validate->getSenha() == "") {
    throw new InvalidArgumentException(""
            . "A Senha esta em branco");
        }
    }

    #Faz a encriptação da senha
    public function passwordHash($Senha){
       return password_hash($Senha, PASSWORD_DEFAULT);
    }

    #Verifica se a senha é a mesma da confirmação de senha
    public function validateConfSenha(Cliente $Validate){
        if($Validate->getSenha() == $Validate->SenhaConf()){
                return true;
        }else{
                throw new InvalidArgumentException(""
                    . "Senha é diferente de confirmação de senha");
        }
    }

    #Verificação da senha com o Hash no banco de dados
    public function validateSenha($Email, $Senha){

    }

    #Verificar se o captcha esta correto
    public function validateCaptcha(Cliente $ReCaptcha, $Score=0.1){
        $return=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret='6Le6J60UAAAAAJyzsR8D7gCyqjQBiO6CW07HKF3B'&response={$ReCaptcha->getReCaptcha()}");
        return $return;
    }



    #Faz o registro do Token
    public function registrarToken(Cliente $Cliente){

        if ($Cliente->getEmail() == null || 
                $Cliente->getEmail() == "") {
            throw new InvalidArgumentException(""
                    . "O número de Email do Cliente esta em branco");
        }

        if ($Cliente->getToken() == null || 
                $Cliente->getToken() == "") {
            throw new InvalidArgumentException(""
                    . "O número de Token do Cliente esta em branco");
        }

        return $this->ClienteDao->inserirToken($Cliente);

    }

    #Faz a validação do email se existe no banco
    public function validarEmail(Cliente $Cliente, $action=null){

        if ($Cliente->getEmail() == null || 
                $Cliente->getEmail() == "") {
            throw new InvalidArgumentException(""
                    . "O Email do Cliente esta em branco");
        }
        
        $resultado = $this->ClienteDao->validarIssetEmail($Cliente);

        if($action==null){
                if($resultado > 0){
                        throw new InvalidArgumentException(""
                        . "O Email Já existe!");
                        return false;
                }else{
                    return true;
                }
                
        }else{
                if($resultado > 0){
                        return true;
                }else{
                        throw new InvalidArgumentException(""
                        . "O Email não esta cadastrado!");
                        return false; 
                }

        }

    }
}
