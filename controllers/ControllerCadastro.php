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
        
        // if(isset($_POST)){
        //     $gRecaptchaResponse=$_POST['g-recaptcha-response'];
        //     $cBl6= new ClienteBl();
        //     $Captcha = new Cliente();
        //     $Captcha->setReCaptcha($gRecaptchaResponse);
        //     $resultado5 = $cBl6->validateCaptcha($Captcha);
        //     var_dump(validateCaptcha($Captcha));
        // }

        #Envia senha para ser validada se não esta vazia
        if(isset($_POST)){
            $Senha = $_POST['Senha'];
            $cBl0= new ClienteBl();
            $Validate = new Cliente();
            $Validate->setSenha($Senha);
            $resultado5 = $cBl0->validarSenha($Validate);

            #Envia senha para ser encriptada
            $cBl4 = new ClienteBl();
            $SenhaHash = $cBl4->passwordHash($Senha);
            $Cliente->setSenhaHash($SenhaHash);
        }

        if(isset($_POST)){
            #Envia senha para ser validada se é diferente da confirmação
            $SenhaConf= $_POST['SenhaConf'];
            $cBl5= new ClienteBl();
            $Validate->setSenhaConf($SenhaConf);
            $resultado4 = $cBl5->validateConfSenha($Validate);
        }

        #Cria o token
        $Token=bin2hex(random_bytes(64));
        $Cliente->setToken($Token);

        $cBl3= new ClienteBl();
        $resultado3 = $cBl3->validarEmail($Cliente);
        $cBl2= new ClienteBl();
        $resultado2 = $cBl2->registrarToken($Cliente);
        $cBl = new ClienteBl();
        $resultado = $cBl->registrarCliente($Cliente);
        
        var_dump($resultado);
        var_dump($resultado2);
        var_dump($resultado3);

        if ($resultado == SUCESSO){
            echo "ok cadastro inserido com sucesso <br>";
        } else {
            echo "nao foi inserido";    
        }
        if ($resultado2 == SUCESSO) {
            echo "ok Token inserido com sucesso";
        } else {
            echo "nao foi inserido";
        }
        if ($resultado3 == SUCESSO) {
            echo "ok Email Validado com sucesso";
        } else {
            echo "nao foi inserido";
        }
        
        
        
    }?>