<?php include("Header.php");
include_once '../dao/EditoraDao.php';
include_once '../dao/AutorDao.php';
$Editora= new EditoraDao();
$Autor= new AutorDao();
$BFetch=$Editora->listarFetchAll();
//var_dump($BFetch);
$Fetch=$Autor->listarFetchAll();
//var_dump($Fetch);
?>
<form name="FormCadastro" id="FormCadastro" action="<?php echo '../controllers/ControllerLivro.php';?>" enctype="multipart/form-data" method="post">
    <div class="cadastroWw">

    <!-- <div class="Logo floatR ">
            <img src="<?php echo '../public/img/Logo0-frayHord-B-G.png'; ?>" alt="Logo">
    </div> -->
    <h1>Cadastrar Livros</h1>
    <div class="floatL">
    <input class="h40 floatL w100" type="text" name="NomeLivro" id="NomeLivro" placeholder="Nome" required><br>
    <input class="h40 floatL w100" type="text" name="Ano_Publi" id="Ano_Publi" placeholder="Ano de publicação" required><br>
    <input class="h40 floatL w100" type="text" name="Preco" id="Preco" placeholder="Preço"required><br>
    <input class="h40 floatL w100" type="text" name="Descricao" id="Descricao" placeholder="Descrição"required><br>

    <select name="ID_Editora" id="ID_Editora">
        <?php foreach($BFetch as $row){ ?>
            <option  value="<?php echo $row['ID']; ?>"><?php echo $row['NomeEditora']; ?></option>
        <?php }?>
    </select>
    <select name="ID_Autor" id="ID_Autor">
        <?php foreach($Fetch as $row){ ?>
            <option  value="<?php echo $row['ID']; ?>"><?php echo $row['NomeAutor']; ?></option>
        <?php }?>
    </select>
    <input class="h40 floatL w100" type="file" name="Livro_Img" id="Livro_Img" required />
    <input class="h40 floatR center" type="submit" value="Cadastrar">
    </div>
    </div>
</form>
<?php include("Footer.php");?>