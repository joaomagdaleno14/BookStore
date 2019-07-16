<?php 
    include_once '../model/Editora.php';
    include_once '../bl/EditoraBl.php';
    include_once '../common/respostas.php';
    if (isset($_POST)){
        $Editora = new Editora();
        $Editora->setNome($_POST['Nome']);

        $tmpName = $_FILES['Img']['tmp_name'];
        $name = $_FILES['Img']['name'];

        move_uploaded_file($tmpName, "../public/img/".$name);

        $Editora->setImg($name);
        
        $eBl = new EditoraBl();
        $resultado = $eBl->registrarEditora($Editora);
        
        if ($resultado == true){
            echo "ok inserido com sucesso";
        } else {
            echo "nao foi inserido";    
        }
        
        
    }?>