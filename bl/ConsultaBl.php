<?php

include_once '../model/Consulta.php';
include_once '../common/respostas.php';
include_once '../dao/ConsultaDao.php';
class ConsultaBl {
    
    private $ConsultaDao = null;
    
    function __construct() {
        $this->ConsultaDao = new ConsultaDao();
    }

    public function registrarConsulta(Consulta $Consulta){        
        if ($Consulta->getData() == null || 
                $Consulta->getData() == "") {
            throw new InvalidArgumentException(""
                    . "A data da Consulta esta em branco");
        }

        if ($Consulta->getPaciente_ID() == null || 
                $Consulta->getPaciente_ID() == "") {
            throw new InvalidArgumentException(""
                    . "O paciente da Consulta esta em branco");
        }

        if ($Consulta->getNomeDent() == null || 
                $Consulta->getNomeDent() == "") {
            throw new InvalidArgumentException(""
                    . "O nome do dentista da Consulta esta em branco");
        }

        if ($Consulta->getTratamento() == null || 
                $Consulta->getTratamento() == "") {
            throw new InvalidArgumentException(""
                    . "O Tratamento da Consulta esta em branco");
        }

        if ($Consulta->getSituacao() == null || 
                $Consulta->getSituacao() == "") {
            throw new InvalidArgumentException(""
                    . "A Situacao da Consulta esta em branco");
        }

        return $this->ConsultaDao->inserir($Consulta);
    }
    
}
