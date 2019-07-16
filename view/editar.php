<?php
    include("../dao/ClienteDao.php");
include("Header.php");
if(isset($_GET['id'])){
    $obj=$_GET['id'];
    $Cliente= new ClienteDao();
    $BFetch=$Cliente->listarunico($obj);

    $Nome=$BFetch['Nome'];
    $Sobrenome=$BFetch['Sobrenome'];
    $CPF=$BFetch['CPF'];
    $Dt_Nascimento=$BFetch['Dt_Nascimento'];
    $Telefone=$BFetch['Telefone'];
    $Email=$BFetch['Email'];
    $Senha=$BFetch['Senha'];
}
?>
<form name="FormCadastro" id="FormCadastro" action="<?php echo '../controllers/ControllerEditar.php';?>" method="post">
    <div class="cadastroW">

    <h1>Cadastrar Cliente</h1>
    <div class="floatL">
    <input class="h40 floatL w100" type="text" name="Nome" id="Nome" placeholder="Nome" value="<?php echo $Nome?>" required><br>
    <input class="h40 floatL w100" type="text" name="Sobrenome" id="Sobrenome" placeholder="Sobrenome" value="<?php echo $Sobrenome?>" required><br>
    <input class="h40 floatL w100" type="text" name="CPF" id="CPF" placeholder="CPF" value="<?php echo $CPF?>" required><br>
    <input class="h40 floatL w100" type="date" name="Dt_Nascimento" id="Dt_Nascimento" value="<?php echo $Dt_Nascimento?>" required><br>
    <input class="h40 floatL w100" type="text" name="Telefone" id="Telefone" placeholder="Telefone" value="<?php echo $Telefone?>" required><br>
    </div>
    <div class="floatR">
    <input class="h40 floatR w100" type="email" id="Email" name="Email" placeholder="Email" value="<?php echo $Email?>" required><br>
    <input class="h40 floatR w100" type="password" name="Senha" id="Senha" placeholder="Senha" value="<?php echo $Senha?>" required><br>
    <input class="h40 floatR center" type="submit">
    </div>
    </div>
</form>
<?php include("Footer.php");?>




