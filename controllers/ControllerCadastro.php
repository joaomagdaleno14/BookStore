<?php 
    include_once '../model/Cliente.php';
    include_once '../bl/ClientesBl.php';
    include_once '../common/respostas.php';
    if (isset($_POST)){
        $Cliente = new Cliente();
        $cBl = new ClienteBl();
        $Cliente->setNomeCliente($_POST['NomeCliente']);        
        $Cliente->setSobrenome($_POST['Sobrenome']);        
        $Cliente->setCPF($_POST['CPF']);        
        $Cliente->setDt_Nascimento($_POST['Dt_Nascimento']);        
        $Cliente->setTelefone($_POST['Telefone']);        
       
        #Verifica os dados gerais se não estão vazios
        $resultado = $cBl->validateFields($Cliente);
        if($resultado == true){
            echo "Cadastro verificado com sucesso <br>";
            var_dump($resultado);
        }else{
            echo "Existe dados em branco <br>";
            var_dump($resultado);
        }
        

        #Envia senha para ser validada se não esta vazia
        $Senha = $_POST['Senha'];
        $Cliente->setSenha($Senha);
        $resultado1 = $cBl->validarSenha($Cliente);
        var_dump($resultado1);

        #valida conf senha
        $SenhaConf= $_POST['SenhaConf'];
        $Cliente->setSenhaConf($SenhaConf);
        $resultado2 = $cBl->validateConfSenha($Cliente);
        if($resultado2 == true){
            echo "Senha conf validada com sucesso<br>";
            var_dump($resultado2);
        }else{
            echo "Senha conf em branco";
            var_dump($resultado2);
        }

        #Envia senha para ser encriptada
        $SenhaHash = $cBl->passwordHash($Senha);
        $Cliente->setSenhaHash($SenhaHash);

        #Valida email
        $Email = $_POST['Email'];
        $Cliente->setEmail($Email);
        $resultado3 = $cBl->validarEmail($Cliente);
        var_dump($resultado3);

        

        #Valida se existe email no banco
        $resultad4 = $cBl->ValidateIssetEmail($Cliente);
        var_dump($resultad4);

        #Cria o token
        $Token=bin2hex(random_bytes(64));
        $Cliente->setToken($Token);

        #Registra Token
        $resultado4 = $cBl->registrarToken($Cliente);
        var_dump($resultado4);

        $resultado6 = $cBl->ValidateFinalCad($Cliente);
        var_dump($resultado6);
        

        // if(isset($_POST)){
            //     $gRecaptchaResponse=$_POST['g-recaptcha-response'];
            //     $Captcha = new Cliente();
            //     $Captcha->setReCaptcha($gRecaptchaResponse);
            //     $resultado5 = $cBl->validateCaptcha($Captcha);
            //     var_dump(validateCaptcha($Captcha));
            // }
            

        // if ($resultad6 == SUCESSO){
        //     echo "ok cadastro inserido com sucesso <br>";
        // } else {
        //     echo "nao foi inserido";    
        // }
        // if ($resultado2 == SUCESSO) {
        //     echo "ok Token inserido com sucesso";
        // } else {
        //     echo "nao foi inserido";
        // }
        // if ($resultado3 == SUCESSO) {
        //     echo "ok Email Validado com sucesso";
        // } else {
        //     echo "nao foi validado";
        // }
        
        
        
    }?>