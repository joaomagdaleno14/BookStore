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
        }else{
            echo "Existe dados em branco <br>";
        }
        

        #Envia senha para ser validada se não esta vazia
        $Senha = $_POST['Senha'];
        $Cliente->setSenha($Senha);
        $resultado1 = $cBl->validarSenha($Cliente);

        #valida conf senha
        $SenhaConf= $_POST['SenhaConf'];
        $Cliente->setSenhaConf($SenhaConf);
        $resultado2 = $cBl->validateConfSenha($Cliente);
        if($resultado2 == true){
            echo "Senha conf validada com sucesso<br>";

        }else{
            echo "Senha conf em branco";

        }

        #Envia senha para ser encriptada
        $SenhaHash = $cBl->passwordHash($Senha);
        $Cliente->setSenhaHash($SenhaHash);

        #Valida email
        $Email = $_POST['Email'];
        $Cliente->setEmail($Email);
        $resultado3 = $cBl->validarEmail($Cliente);


        

        #Valida se existe email no banco
        $resultad4 = $cBl->ValidateIssetEmail($Cliente);


        #Cria o token
        $Token=bin2hex(random_bytes(64));
        $Cliente->setToken($Token);

        #Registra Token
        $resultado4 = $cBl->registrarToken($Cliente);


        $resultado6 = $cBl->ValidateFinalCad($Cliente);
        

        $captcha;
        $captcha = filter_input(INPUT_POST, 'token', FILTER_SANITIZE_STRING);

        var_dump($captcha);

        if(!$captcha){
          echo '<h2>Please check the the captcha form.</h2>';
          exit;
        }
        $secretKey = "6LfrbK8UAAAAAGHEsY0Epz2DF3q1HSpbUmlpGlKA";
        $ip = $_SERVER['REMOTE_ADDR'];
      
        // post request to server
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = array('secret' => $secretKey, 'response' => $captcha);
      
        $options = array(
          'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)
          )
        );
        $context  = stream_context_create($options);
        $response = file_get_contents($url, false, $context);
        $responseKeys = json_decode($response,true);
        header('Content-type: application/json');
        if($responseKeys["success"]) {
          echo json_encode(array('success' => 'true'));
        } else {
          echo json_encode(array('success' => 'false'));
        }




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