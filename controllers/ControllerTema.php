<?php 
    include_once '../model/Tema.php';
    include_once '../bl/TemaBl.php';
    include_once '../common/respostas.php';
    if (isset($_POST)){
        $Tema = new Tema();
        $Tema->setNomeTema($_POST['NomeTema']);        
        $tBl = new TemaBl();
        $resultado = $tBl->registrarTema($Tema);
        
        if ($resultado == SUCESSO){
            echo "ok inserido com sucesso";
        } else {
            echo "nao foi inserido";    
        }
        
        
    }?>