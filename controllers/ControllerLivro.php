<?php 
    include_once '../model/Livro.php';
    include_once '../bl/LivroBl.php';
    include_once '../common/respostas.php';
    if (isset($_POST)){
        $Livro = new Livro();
        $Livro->setNomeLivro($_POST['NomeLivro']);
        $Livro->setAno_Publi($_POST['Ano_Publi']);
        $Livro->setPreco($_POST['Preco']);
        $Livro->setDescricao($_POST['Descricao']);
        $Livro->setID_Editora($_POST['ID_Editora']);
        $Livro->setID_Autor($_POST['ID_Autor']);


        $tmpName = $_FILES['Img']['tmp_name'];
        $name = $_FILES['Img']['name'];

        move_uploaded_file($tmpName, "../public/img/".$name);

        $Livro->setImg($name);
        
        $lBl = new LivroBl();
        $resultado = $lBl->registrarLivro($Livro);
        
        if ($resultado == true){
            echo "ok inserido com sucesso";
        } else {
            echo "nao foi inserido";    
        }
        
    }?>