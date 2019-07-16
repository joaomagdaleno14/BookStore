<?php

include_once '../model/Autor.php';
include_once '../common/respostas.php';
include_once '../dao/AutorDao.php';
class AutorBl {
    
    private $AutorDao = null;
    
    function __construct() {
        $this->AutorDao = new AutorDao();
    }

    public function registrarAutor(Autor $Autor){        
        if ($Autor->getNomeAutor() == null || 
                $Autor->getNome() == "") {
            throw new InvalidArgumentException(""
                    . "O nome do Autor esta em branco");
        }
        if ($Autor->getDescricao() == null || 
                $Autor->getDescricao() == "") {
            throw new InvalidArgumentException(""
                    . "O DescrgetDescricao do Autor esta em branco");
        }
        if ($Autor->getImg() == null || 
                $Autor->getImg() == "") {
            throw new InvalidArgumentException(""
                    . "A Img da Autor esta em branco");
        }

        return $this->AutorDao->inserir($Autor);
    }
}