<?php

include_once '../model/Livro.php';
include_once '../common/respostas.php';
include_once '../dao/LivroDao.php';
class LivroBl {
    
    private $LivroDao = null;
    
    function __construct() {
        $this->LivroDao = new LivroDao();
    }

    public function registrarLivro(Livro $Livro){        
        if ($Livro->getNomeLivro() == null || 
                $Livro->getNomeLivro() == "") {
            throw new InvalidArgumentException(""
                    . "O nome do Livro esta em branco");
        }
        if ($Livro->getAno_Publi() == null || 
                $Livro->getAno_Publi() == "") {
            throw new InvalidArgumentException(""
                    . "O Ano_Publi do Livro esta em branco");
        }
        if ($Livro->getPreco() == null || 
                $Livro->getPreco() == "") {
            throw new InvalidArgumentException(""
                    . "O Preco do Livro esta em branco");
        }
        if ($Livro->getDescricao() == null || 
                $Livro->getDescricao() == "") {
            throw new InvalidArgumentException(""
                    . "O Descricao do Livro esta em branco");
        }
        if ($Livro->getID_Editora() == null || 
                $Livro->getID_Editora() == "") {
            throw new InvalidArgumentException(""
                    . "O ID_Editora do Livro esta em branco");
        }
        if ($Livro->getID_Autor() == null || 
                $Livro->getID_Autor() == "") {
            throw new InvalidArgumentException(""
                    . "O ID_Autor do Livro esta em branco");
        }
        if ($Livro->getImg() == null || 
                $Livro->getImg() == "") {
            throw new InvalidArgumentException(""
                    . "A Img da Livro esta em branco");
        }

        return $this->LivroDao->inserir($Livro);
    }
}