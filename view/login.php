
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BookStore</title>
    <link rel="stylesheet" href="../public/css/Style.css">
</head>

<body>

<form name="FormLogin" id="FormLogin" action="<?php echo '../controllers/ControllerLogin.php' ?>" method="post">
    <div class="login">

        <!-- <div class="Logo float ">
            <img src="<?php echo DIRPAGE.'public/img/Logo0-frayHord-B-G.svg'; ?>" alt="Logo">
        </div> -->

        <h1>Entrar</h1>
        <div class="loginForm">
            <input class="h40 float w100" type="email" name="Email" id="Email" placeholder="Email:" required><br>
            <input class="h40 float w100" type="password" name="Senha" id="Senha" placeholder="Senha:" required><br>
            <input class="h40 floatR center" type="submit" value="Entrar">
            <div class="loginTextos float "><a href="<?php echo 'view/esquecisenha.php';?>"> Esqueci minha senha</a></div>
            <div class="loginTextos float ">Não tem uma conta? <a href="<?php echo 'view/cadastro.php';?>">Crie uma!</a></div>
        </div>
    </div>
</form>
<?php include("Footer.php");?>