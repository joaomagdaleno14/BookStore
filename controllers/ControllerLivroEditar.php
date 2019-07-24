<?php 
    include_once '../model/Livro.php';
    include_once '../bl/LivroBl.php';
    include_once '../common/respostas.php';
    if (isset($_POST)){
        $Livro = new Livro();
        $cBl = new LivroBl();
        $Livro->setNomeLivro($_POST['NomeLivro']);           
        $Livro->setId($_POST['id']);
        $Livro->setAno_Publi($_POST['Ano_Publi']);
        $Livro->setPreco($_POST['Preco']);
        $Livro->setDescricao($_POST['Descricao']);
        $Livro->setID_Editora($_POST['ID_Editora']);
        $Livro->setID_Autor($_POST['ID_Autor']);

        $tmpName = $_FILES['Livro_Img']['tmp_name'];
        $name = $_FILES['Livro_Img']['name'];
        move_uploaded_file($tmpName, "../public/img/".$name);

        $Livro->setLivro_Img($name);

        $resultado = $cBl->alterarLivro($Livro);



        if ($resultado == true){
            echo "ok inserido com sucesso";
        } else {
            echo "nao foi inserido";    
        }
        
        
    }?>