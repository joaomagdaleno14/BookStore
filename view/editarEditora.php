<?php
    include("../dao/EditoraDao.php");
include("Header.php");
if(isset($_GET['id'])){
    $Editora= new EditoraDao();
    $Editora->setId($_GET['id']);
    $BFetch=$Editora->listarunico($Editora);

    $Nome=$BFetch['Nome'];
    $Sobrenome=$BFetch['Img'];
}
?>
<form name="FormCadastro" id="FormCadastro" action="<?php echo '../controllers/ControllerEditar.php';?>" method="post">
    <div class="cadastroW">

    <h1>Cadastrar Editora</h1>
    <div class="floatL">
    <input class="h40 floatL w100" type="text" name="Nome" id="Nome" placeholder="Nome" value="<?php echo $Nome?>" required><br>
    <input class="h40 floatL w100" type="text" name="Sobrenome" id="Sobrenome" placeholder="Sobrenome" value="<?php echo $Sobrenome?>" required><br>
    <input class="h40 floatR center" type="submit">
    </div>
    </div>
</form>
<?php include("Footer.php");?>