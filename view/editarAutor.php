<?php
    include("../dao/AutorDao.php");
include("Header.php");
if(isset($_GET['id'])){
    $Autor= new AutorDao();
    $Autor->setId($_GET['id']);
    $BFetch=$Autor->listarunico($Autor);

    $Id = $_GET['id'];
    $NomeAutor=$BFetch['NomeAutor'];
    $Descricao=$BFetch['Descricao'];
    $Img=$BFetch['Autor_Img'];
}
?>
<form name="FormCadastro" id="FormCadastro" action="<?php echo '../controllers/ControllerAutorEditar.php';?>" method="post">
    <div class="cadastroW">

        <h1>Cadastrar Autor</h1>
        <div class="floatL">
            <input class="h40 floatL w100" type="hidden" name="id" id="id" placeholder="id" value="<?php echo $Id?>" required><br>
            <input class="h40 floatL w100" type="text" name="NomeAutor" id="NomeAutor" placeholder="NomeAutor" value="<?php echo $NomeAutor?>" required><br>
            <input class="h40 floatL w100" type="file" name="Autor_Img" id="Autor_Img" placeholder="Autor_Img" value="<?php echo $Img?>" required><br>
            <input class="h40 floatR center" type="submit">
        </div>
    </div>
</form>
<?php include("Footer.php");?>