<?php
    include("../dao/LivroDao.php");
include("Header.php");
if(isset($_GET['id'])){
    $Livro= new LivroDao();
    $Livro->setId($_GET['id']);
    $BFetch=$Livro->listarunico($Livro);

    $Id = $_GET['id'];
    $NomeLivro=$BFetch['NomeLivro'];
    $Ano_Publi=$BFetch['Ano_Publi'];
    $Preco=$BFetch['Preco'];
    $Descricao=$BFetch['Descricao'];
    $Img=$BFetch['Livro_Img'];
}
?>
<form name="FormCadastro" id="FormCadastro" action="<?php echo '../controllers/ControllerLivroEditar.php';?>" method="post">
    <div class="cadastroW">

        <h1>Cadastrar Livro</h1>
        <div class="floatL">
            <input class="h40 floatL w100" type="hidden" name="id" id="id" placeholder="id" value="<?php echo $Id?>" required><br>
            <input class="h40 floatL w100" type="text" name="NomeLivro" id="NomeLivro" placeholder="NomeLivro" value="<?php echo $NomeLivro?>" required><br>
            <input class="h40 floatL w100" type="text" name="Ano_Publi" id="Ano_Publi" placeholder="Ano_Publi" value="<?php echo $Ano_Publi?>" required><br>
            <input class="h40 floatL w100" type="text" name="Preco" id="Preco" placeholder="Preco" value="<?php echo $Preco?>" required><br>
            <input class="h40 floatL w100" type="text" name="Descricao" id="Descricao" placeholder="Descricao" value="<?php echo $Descricao?>" required><br>

            <select name="ID_Editora">
                    <?php foreach($BFetch as $row){ ?>
                <option value="<?php echo $row['ID']; ?>"><?php echo $row['NomeEditora']; ?></option>
                <?php }?>
            </select>
            <select name="ID_Autor">
                    <?php foreach($BFetch as $row){ ?>
                <option value="<?php echo $row['ID']; ?>"><?php echo $row['NomeAutor']; ?></option>
                <?php }?>
            </select>
            
            <input class="h40 floatL w100" type="file" name="Livro_Img" id="Livro_Img" placeholder="Livro_Img" value="<?php echo $Img?>" required><br>
            <input class="h40 floatR center" type="submit">
        </div>
    </div>
</form>
<?php include("Footer.php");?>