<?php

include_once '../model/Tema.php';
include_once '../common/respostas.php';
include_once '../dao/TemaDao.php';
class TemaBl {
    
    private $TemaDao = null;
    
    function __construct() {
        $this->TemaDao = new TemaDao();
    }

    public function registrarTema(Tema $Tema){        
        if ($Tema->getNome() == null || 
                $Tema->getNome() == "") {
            throw new InvalidArgumentException(""
                    . "O nome do Tema esta em branco");
        }

        return $this->TemaDao->inserir($Tema);
    }
    
}