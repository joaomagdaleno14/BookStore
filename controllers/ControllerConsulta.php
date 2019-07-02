<?php 
    include_once '../model/Consulta.php';
    include_once '../bl/ConsultaBl.php';
    include_once '../common/respostas.php';
    if (isset($_POST)){
        $Consulta = new Consulta();
        $Consulta->setData($_POST['Data']);        
        $Consulta->setPaciente_ID($_POST['Paciente_ID']);        
        $Consulta->setNomeDent($_POST['NomesetNomeDent']);        
        $Consulta->setTratamento($_POST['TrsetTratamento']);        
        $Consulta->setSituacao($_POST['SisetSituacao']);        
        $pBl = new ConsultaBl();
        $resultado = $pBl->registrarConsulta($Consulta);

        if ($resultado == SUCESSO){
            $login = $_POST['Email'];
            $subject = "";
            $message = "
            mensagem, mensagem
            "; // fim da mensagem
            $headers .= "To: $nome <$login>" . "\r\n";
            $headers .= "From: Danilo DCS <email@email.com.br>" . "\r\n";
            $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
            mail($login, $subject, $message, $headers);
            echo "ok inserido com sucesso";
        } else {
            echo "nao foi inserido";    
        }
        
        
    }?>