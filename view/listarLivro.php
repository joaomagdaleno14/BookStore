<?php 
    include_once "../dao/LivroDao.php";
    include_once "Header.php";
?>

<div class="Content">
    <table class="Tabela" >
    <h1>Seleção dos Livros<h1>
        <tr>
            <td>Nome</td>
            <td>Ano_Publi</td>
            <td>Preco</td>
            <td>Descricao</td>
            <td>Editora</td>
            <td>Autor</td>
            <td>Img</td>
            <td>Ações</td>
        </tr>

        <!---- Estrutura de Loop ------>

        <?php $Livro= new LivroDao();
            $BFetch=$Livro->listarFetchAll();
            foreach($BFetch as $row){
        ?>
        <tr>
            <td><?php echo $row['NomeLivro'];?></td>
            <td><?php echo $row['Ano_Publi'];?></td>
            <td><?php echo $row['Preco'];?></td>
            <td><?php echo $row['Descricao'];?></td>
            <td><?php echo $row['NomeEditora'];?></td>
            <td><?php echo $row['NomeAutor'];?></td>
            <td><img src="../public/img/<?php echo $row['Livro_Img'];?>"></td>

            <td>
                <a href="<?php echo "editarLivro.php?id=".$row['ID'].";"?>"><img src="../public/img/edit.png" alt="Editar"></a>
                <a class="Deletar" href="<?php echo "Controllers/ControllerDeleteLivro.php?id={$row['ID']}"; ?>"><img src="../public/img/delete.png" alt="Deletar"></a>
            </td>


        </tr>

        <?php  
        }?>
    </table>
</div>

<?php 
    include("Footer.php")
?>