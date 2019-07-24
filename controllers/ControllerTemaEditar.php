<?php 
    include_once '../model/Tema.php';
    include_once '../bl/TemaBl.php';
    include_once '../common/respostas.php';
    if (isset($_POST)){
        $Tema = new Tema();
        $cBl = new TemaBl();
        $Tema->setNomeTema($_POST['NomeTema']);           
        $Tema->setId($_POST['id']);
        
        var_dump($Tema);
        $resultado = $cBl->alterarTema($Tema);
        
        if ($resultado == true){
            echo "ok inserido com sucesso";
        } else {
            echo "nao foi inserido";    
        }
        
        
    }?>