<?php 
    include_once '../model/Autor.php';
    include_once '../bl/AutorBl.php';
    include_once '../common/respostas.php';
    if (isset($_POST)){
        $Autor = new Autor();
        $cBl = new AutorBl();
        $Autor->setNomeAutor($_POST['NomeAutor']);           
        $Autor->setId($_POST['id']);

        $tmpName = $_FILES['Autor_Img']['tmp_name'];
        $name = $_FILES['Autor_Img']['name'];
        move_uploaded_file($tmpName, "../public/img/".$name);

        $Autor->setAutor_Img($name);
        var_dump($Autor);
        $resultado = $cBl->alterarAutor($Autor);
        
        if ($resultado == true){
            echo "ok inserido com sucesso";
        } else {
            echo "nao foi inserido";    
        }
        
        
    }?>