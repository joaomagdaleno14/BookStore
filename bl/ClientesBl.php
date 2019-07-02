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

        if ($Cliente->getDtNasc() == null || 
                $Cliente->getDtNasc() == "") {
            throw new InvalidArgumentException(""
                    . "A data de nascimento do Cliente esta em branco");
        }

        if ($Cliente->getEndereco() == null || 
                $Cliente->getEndereco() == "") {
            throw new InvalidArgumentException(""
                    . "O endereço do Cliente esta em branco");
        }

        if ($Cliente->getEmail() == null || 
                $Cliente->getEmail() == "") {
            throw new InvalidArgumentException(""
                    . "O e-mail do Cliente esta em branco");
        }

        if ($Cliente->getCelular() == null || 
                $Cliente->getCelular() == "") {
            throw new InvalidArgumentException(""
                    . "O número de celular do Cliente esta em branco");
        }

        return $this->ClienteDao->inserir($Cliente);
    }
    
}
