<?php
include_once '../model/Cliente.php';
    include_once '../bl/ClientesBl.php';
    include_once '../common/respostas.php';
        
if(isset($_POST)){
    $Email = $_POST['Email'];
    $Validate = new Cliente();
    $Validate->setEmail($Email);
    $cBl3= new ClienteBl();
    $resultado3 = $cBl3->validarEmail($Validate);

    $cBl7 = new ClienteBl();
    $Conf = $cBl7->validateIssetEmail($Validate, "login");

    var_dump(validateIssetEmail($Validate, "login"));
    
}
if(isset($_POST)){
    $Senha = $_POST['Senha'];
    $cBl0= new ClienteBl();
    $Validate = new Cliente();
    $Validate->setSenha($Senha);
    $resultado5 = $cBl0->validarSenha($Validate);
}