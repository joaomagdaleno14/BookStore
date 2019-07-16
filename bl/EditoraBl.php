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
        if ($Editora->getNome() == null || 
                $Editora->getNome() == "") {
            throw new InvalidArgumentException(""
                    . "O nome do Editora esta em branco");
        }
        if ($Editora->getImg() == null || 
                $Editora->getImg() == "") {
            throw new InvalidArgumentException(""
                    . "A Img da Editora esta em branco");
        }

        return $this->EditoraDao->inserir($Editora);
    }
    
}