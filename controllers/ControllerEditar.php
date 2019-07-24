<?php 
    include_once '../model/Cliente.php';
    include_once '../bl/ClientesBl.php';
    include_once '../common/respostas.php';
    if (isset($_POST)){
        $Cliente = new Cliente();
        $cBl = new ClienteBl();
        $Cliente->setNomeCliente($_POST['NomeCliente']);        
        $Cliente->setSobrenome($_POST['Sobrenome']);          
        $Cliente->setDt_Nascimento($_POST['Dt_Nascimento']);        
        $Cliente->setTelefone($_POST['Telefone']);        
        $Cliente->setEmail($_POST['Email']);          
        $resultado = $cBl->alterarCliente($Cliente);
        
        if ($resultado == SUCESSO){
            echo "ok inserido com sucesso";
        } else {
            echo "nao foi inserido";    
        }
        
        
    }?>