<?php include("Header.php");
include_once '../dao/EditoraDao.php';
include_once '../dao/AutorDao.php';
$Editora= new EditoraDao();
$Autor= new AutorDao();
$BFetch=$Editora->listarFetchAll();
$Fetch=$Autor->listarFetchAll();

?>
<form name="FormCadastro" id="FormCadastro" action="<?php echo '../controllers/ControllerLivro.php';?>" enctype="multipart/form-data" method="post">
    <div class="cadastro">

    <!-- <div class="Logo floatR ">
            <img src="<?php echo '../public/img/Logo0-frayHord-B-G.png'; ?>" alt="Logo">
    </div> -->
    <h1>Cadastrar Livros</h1>
    <div class="floatL">
    <input class="h40 floatL w100" type="text" name="Nome" id="Nome" placeholder="Nome" required><br>
    <label>Ano de publicação</label>
    <input class="h40 floatL w100" type="date" name="Ano_Publi" id="Ano_Publi" required><br>
    <input class="h40 floatL w100" type="text" name="Preco" id="Preco" required><br>
    <input class="h40 floatL w100" type="text" name="Descricao" id="Descricao" required><br>

    <select name="ID_Editora" id="ID_Editora">
        <?php foreach($BFetch as $row){ ?>
            <option  value="<?php echo $row['ID']; ?>"><?php echo $row['Nome']; ?></option>
        <?php }?>
    </select>
    <select name="ID_Autor" id="ID_Autor">
        <?php foreach($Fetch as $row){ ?>
            <option  value="<?php echo $row['ID']; ?>"><?php echo $row['Nome']; ?></option>
        <?php }?>
    </select>
    <input class="h40 floatL w100" type="file" name="imagem" id="Img" required />
    <input class="h40 floatR center" type="submit" value="Cadastrar">
    </div>
    </div>
</form>
<?php include("Footer.php");?>

Ano_Publi   Preco   Descricao   ID_Editora  ID_Autor