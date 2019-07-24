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
                $Autor->getNomeAutor() == "") {
            throw new InvalidArgumentException(""
                    . "O nome do Autor esta em branco");
        }
        if ($Autor->getDescricao() == null || 
                $Autor->getDescricao() == "") {
            throw new InvalidArgumentException(""
                    . "O DescrgetDescricao do Autor esta em branco");
        }
        if ($Autor->getAutor_Img() == null || 
                $Autor->getAutor_Img() == "") {
            throw new InvalidArgumentException(""
                    . "A Autor_Img da Autor esta em branco");
        }

        return $this->AutorDao->inserir($Autor);
    }

    public function alterarAutor(Autor $Autor){
        return $this->AutorDao->update($Autor);
    }
}