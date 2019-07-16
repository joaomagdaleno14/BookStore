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
    public function validateFields(Cliente $Cliente){        
        if ($Cliente->getNomeCliente() == null || 
                $Cliente->getNome() == "") {
                return true;
        }else{
                return false;                
        }
        
        if ($Cliente->getSobrenome() == null || 
                $Cliente->getSobrenome() == "") {
                        return true;
        }else{
                        return false;                
        }

        if ($Cliente->getCPF() == null || 
                $Cliente->getCPF() == "") {
                return true;
        }else{
                return false;                
        }

        if ($Cliente->getDt_Nascimento() == null || 
                $Cliente->getDt_Nascimento() == "") {
                return true;
        }else{
                return false;                
        }

        if ($Cliente->getTelefone() == null || 
                $Cliente->getTelefone() == "") {
                return true;
        }else{
                return false;                
        }
    }

    public function validarSenha(Cliente $Cliente){
        if ($Cliente->getSenha() == null || 
        $Cliente->getSenha() == "") {
                return true;
        }else{
                return false;                
        }
    }

    public function validarEmail(Cliente $Cliente){
        if ($Cliente->getEmail() == null || 
                $Cliente->getEmail() == "" && filter_var($Cliente, FILTER_VALIDATE_EMAIL) ) {
                return true;
        }else{
                return false;
        }
    }

    #Faz a encriptação da senha
    public function passwordHash($Senha){
       return password_hash($Senha, PASSWORD_DEFAULT);
    }

    #Verifica se a senha é a mesma da confirmação de senha
    public function validateConfSenha(Cliente $Cliente){
        if($Cliente->getSenha() == $Cliente->getSenhaConf()){
                return true;
        }else{
                return false;
        }
    }

    #Verificação da senha com o Hash no banco de dados
    public function validateSenha($Email, $Senha){

    }

//     #Verificar se o captcha esta correto
//     public function validateCaptcha(Cliente $ReCaptcha, $Score=0.1){
//         $return=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret='6Le6J60UAAAAAJyzsR8D7gCyqjQBiO6CW07HKF3B'&response=$ReCaptcha->getReCaptcha()");
//         return $return;
//     }



    #Faz o registro do Token
    public function registrarToken(Cliente $Cliente){
        
        $Cliente->getEmail();
        
        if ($Cliente->getToken() == null || 
                $Cliente->getToken() == "") {
                return true;
        }else{
                return false;
        }

        return $this->ClienteDao->inserirToken($Cliente);

    }

    #Faz a validação do email se existe no banco (Null == Cadastro)
    public function validateIssetEmail(Cliente $Cliente, $action=null){
        
        $Cliente->getEmail();

        $resultado = $this->ClienteDao->validarIssetEmail($Cliente);

        if($action==null){
                if($resultado == true){
                        throw new InvalidArgumentException(""
                        . "O Email Já existe!");
                        return false;
                }else{
                    return true;
                }
                
        }else{ 
                if($resultado == true){
                        return true;
                }else{
                        throw new InvalidArgumentException(""
                        . "O Email não esta cadastrado!");
                        return false; 
                }

        }
    }


    public function ValidateFinalCad(Cliente $Cliente){
        return $this->ClienteDao->inserir($Cliente);
    }

    public function alterarCliente(Cliente $Cliente){
        return $this->ClienteDao->update($Cliente);
    }

}
