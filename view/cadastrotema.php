<?php include("Header.php");?>
<form name="FormCadastro" id="FormCadastro" action="<?php echo '../controllers/ControllerTema.php';?>" method="post">
    <div class="tema">

    <!-- <div class="Logo floatR ">
            <img src="<?php echo '../public/img/Logo0-frayHord-B-G.png'; ?>" alt="Logo">
    </div> -->
    <h1>Cadastrar Tema</h1>
    <div class="floatL">
    <input class="h40 floatL w100" id="temainput" type="text" name="NomeTema" id="NomeTema" placeholder="Nome" required><br>
    <input class="h40 floatR center" type="submit" value="Cadastrar">
    </div>
    </div>
</form>
<?php include("Footer.php");?>


