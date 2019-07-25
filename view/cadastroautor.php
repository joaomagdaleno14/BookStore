<?php include("Header.php");?>
<form name="FormCadastro" id="FormCadastro" action="<?php echo '../controllers/ControllerAutor.php';?>" enctype="multipart/form-data" method="post">
    <div class="autor">

    <!-- <div class="Logo floatR ">
            <img src="<?php echo '../public/img/Logo0-frayHord-B-G.png'; ?>" alt="Logo">
    </div> -->
    <h1>Cadastrar Autor</h1>
    <div class="floatL">
    <input class="h40 floatL w100" type="text" name="NomeAutor" id="NomeAutor" placeholder="NomeAutor" required><br>
    <input class="h40 floatL w100" type="text" name="Descricao" id="Descricao" placeholder="Descrição" required><br>
    <input class="h40 floatL w100" type="file" name="Autor_Img" id="Autor_Img" required />
    <input class="h40 floatR center" type="submit" value="Cadastrar">
    </div>
    </div>
</form>
<?php include("Footer.php");?>