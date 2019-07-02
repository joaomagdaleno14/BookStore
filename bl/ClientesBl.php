<?php

include_once '../model/Cliente.php';
include_once '../common/respostas.php';
include_once '../dao/ClienteDao.php';
class ClienteBl {
    
    private $ClienteDao = null;
    
    function __construct() {
        $this->ClienteDao = new ClienteDao();
    }

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

        if ($Cliente->getEmail() == null || 
                $Cliente->getEmail() == "") {
            throw new InvalidArgumentException(""
                    . "O número de Email do Cliente esta em branco");
        }
        if ($Cliente->getSenha() == null || 
                $Cliente->getSenha() == "") {
            throw new InvalidArgumentException(""
                    . "O número de Senha do Cliente esta em branco");
        }

        return $this->ClienteDao->inserir($Cliente);
    }
    
}
