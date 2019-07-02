<?php 
    include_once '../model/Paciente.php';
    include_once '../bl/PacientesBl.php';
    include_once '../common/respostas.php';
    if (isset($_POST)){
        $paciente = new Paciente();
        $paciente->setNome($_POST['Nome']);        
        $paciente->setDtNasc($_POST['DtNasc']);        
        $paciente->setEndereco($_POST['Endereco']);        
        $paciente->setEmail($_POST['Email']);        
        $paciente->setCelular($_POST['Celular']);        
        $pBl = new PacienteBl();
        $resultado = $pBl->registrarPaciente($paciente);
        
        if ($resultado == SUCESSO){
            echo "ok inserido com sucesso";
        } else {
            echo "nao foi inserido";    
        }
        
        
    }?>