<?php 
    include_once '../model/Editora.php';
    include_once '../bl/EditoraBl.php';
    include_once '../common/respostas.php';
    if (isset($_POST)){
        $Editora = new Editora();
        $Editora->setNome($_POST['Nome']);        
        $eBl = new EditoraBl();
        $resultado = $eBl->registrarEditora($Editora);
        
        if ($resultado == SUCESSO){
            echo "ok inserido com sucesso";
        } else {
            echo "nao foi inserido";    
        }
        
        
    }?>