<?php include("Header.php");?>
<form name="FormCadastro" id="FormCadastro" action="<?php echo '../controllers/ControllerCadastro.php';?>" method="post">
    <div class="cadastroW">

    <!-- <div class="Logo floatR ">
            <img src="<?php echo '../public/img/Logo0-frayHord-B-G.png'; ?>" alt="Logo">
    </div> -->
    <h1>Cadastrar Cliente</h1>
    <div class="floatL">
    <input class="h40 floatL w100" type="text" name="NomeCliente" id="NomeCliente" placeholder="NomeCliente" required><br>
    <input class="h40 floatL w100" type="text" name="Sobrenome" id="Sobrenome" placeholder="Sobrenome" required><br>
    <input class="h40 floatL w100" type="text" name="CPF" id="CPF" placeholder="CPF" required><br>
    <input class="h40 floatL w100" type="date" name="Dt_Nascimento" id="Dt_Nascimento" required><br>
    <input class="h40 floatL w100" type="text" name="Telefone" id="Telefone" placeholder="Telefone" required><br>
    </div>
    <div class="floatR">
    <input class="h40 floatR w100" type="email" id="Email" name="Email" placeholder="Email" required><br>
    <input class="h40 floatR w100" type="password" name="Senha" id="Senha" placeholder="Senha" required><br>
    <input class="h40 floatR w100" type="password" name="SenhaConf" id="SenhaConf" placeholder="Confirmação da Senha" required><br>
    <!-- <input class="h40 floatR w100" type="text" name="g-recaptcha-response" id="g-recaptcha-response"><br> -->
    <input class="h40 floatR center" type="submit" value="Cadastrar">
    <div class="loginTextos floatR ">Já tem conta? <a href="<?php echo 'login.php';?>">Faça o login</a></div>
    </div>
    </div>
</form>
<?php include("Footer.php");?>