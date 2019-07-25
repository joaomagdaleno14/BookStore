<?php include("Header.php");?>
<form name="FormCadastro" id="FormCadastro" action="<?php echo '../controllers/ControllerEditora.php';?>" enctype="multipart/form-data" method="post">
    <div class="editora">
    <!-- <div class="Logo floatR ">
            <img src="<?php echo '../public/img/Logo0-frayHord-B-G.png'; ?>" alt="Logo">
    </div> -->
    <h1>Cadastrar Editora</h1>
    <div class="floatL">
    <input class="h40 floatL w100" type="text" name="NomeEditora" id="NomeEditora" placeholder="Nome" required><br>
    <input class="h40 floatL w100" type="file" name="Editora_Img" id="Editora_Img" required />
    <input class="h40 floatR center" type="submit" value="Cadastrar">
    </div>
    </div>
</form>
<?php include("Footer.php");?>


