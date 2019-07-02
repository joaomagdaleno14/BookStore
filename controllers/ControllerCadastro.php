<?php 
    include_once '../model/Cliente.php';
    include_once '../bl/ClientesBl.php';
    include_once '../common/respostas.php';
    if (isset($_POST)){
        $Cliente = new Cliente();
        $Cliente->setNome($_POST['Nome']);        
        $Cliente->setSobrenome($_POST['Sobrenome']);        
        $Cliente->setCPF($_POST['CPF']);        
        $Cliente->setDt_Nascimento($_POST['Dt_Nascimento']);        
        $Cliente->setTelefone($_POST['Telefone']);        
        $Cliente->setEmail($_POST['Email']);        
        $Cliente->setSenha($_POST['Senha']);        
        $cBl = new ClienteBl();
        $resultado = $cBl->registrarCliente($Cliente);
        
        if ($resultado == SUCESSO){
            echo "ok inserido com sucesso";
        } else {
            echo "nao foi inserido";    
        }
        
        
    }?>