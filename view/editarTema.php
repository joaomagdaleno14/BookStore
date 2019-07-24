<?php
    include("../dao/TemaDao.php");
include("Header.php");
if(isset($_GET['id'])){
    $Tema= new TemaDao();
    $Tema->setId($_GET['id']);
    $BFetch=$Tema->listarunico($Tema);

    $NomeTema=$BFetch['NomeTema'];
    $Id = $_GET['id'];
}
?>
<form name="FormCadastro" id="FormCadastro" action="<?php echo '../controllers/ControllerTemaEditar.php';?>" method="post">
    <div class="cadastroW">

    <h1>Cadastrar Tema</h1>
    <div class="floatL">
    <input class="h40 floatL w100" type="hidden" name="id" id="id" placeholder="id" value="<?php echo $Id?>" required><br>
    <input class="h40 floatL w100" type="text" name="NomeTema" id="NomeTema" placeholder="NomeTema" value="<?php echo $NomeTema?>" required><br>
    <input class="h40 floatR center" type="submit">
    </div>
    </div>
</form>
<?php include("Footer.php");?>