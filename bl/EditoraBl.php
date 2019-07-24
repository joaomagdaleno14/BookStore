<?php

include_once '../model/Editora.php';
include_once '../common/respostas.php';
include_once '../dao/EditoraDao.php';
class EditoraBl {
    
    private $EditoraDao = null;
    
    function __construct() {
        $this->EditoraDao = new EditoraDao();
    }

    public function registrarEditora(Editora $Editora){        
        if ($Editora->getNomeEditora() == null || 
                $Editora->getNomeEditora() == "") {
            throw new InvalidArgumentException(""
                    . "O nome do Editora esta em branco");
        }
        if ($Editora->getEditora_Img() == null || 
                $Editora->getEditora_Img() == "") {
            throw new InvalidArgumentException(""
                    . "A Editora_Img da Editora esta em branco");
        }

        return $this->EditoraDao->inserir($Editora);
    }

    public function alterarEditora(Editora $Editora){
        return $this->EditoraDao->update($Editora);
    }
    
}