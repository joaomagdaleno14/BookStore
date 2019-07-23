<?php
include_once '../model/Cliente.php';
    include_once '../bl/ClientesBl.php';
    include_once '../dao/ClienteDao.php';

    include_once '../common/respostas.php';
        
if(isset($_POST)){
    $Email = $_POST['Email'];
    $cBl= new ClienteBl();
    $Validate = new Cliente();
    $Vali = new ClienteDao();
    $Hash=$Vali->selectsenha();
    foreach ($Hash as $key) {
        $SenhaHash=$key['Senha'];
    }
    var_dump($Hash);
    $Validate->setEmail($Email);;
    $resultado3 = $cBl->validarEmail($Validate);
    $Conf = $cBl->validateIssetEmail($Validate, "login");

    if(password_verify($_POST["Senha"],$SenhaHash)){
        echo "Welcome"; 
    }else{
        echo "Wrong Password";
    }

    var_dump(validateIssetEmail($Validate, "login"));
    
}
if(isset($_POST)){
    $Senha = $_POST['Senha'];
    $cBl0= new ClienteBl();
    $Validate = new Cliente();
    $Validate->setSenha($Senha);
    $resultado5 = $cBl0->validarSenha($Validate);
}