<?php 
    include("../dao/AutorDao.php");
    include("Header.php");
?>

<div class="Content">
    <table class="Tabela">
    <h1>Seleção das Autor<h1>
        <tr>
            <td>Nome</td>
            <td>Descricao</td>
            <td>Img</td>
            <td>Ações</td>
        </tr>

        <!---- Estrutura de Loop ------>

        <?php $Autor= new AutorDao();
            $BFetch=$Autor->listarFetchAll();
            foreach($BFetch as $row){
        ?>
        <tr>
            <td><?php echo $row['NomeAutor'];?></td>
            <td><?php echo $row['Descricao'];?></td>
            <td><?php echo $row['Img'];?></td>

            <td>
                <a href="<?php echo "editarAutor.php?id=".$row['ID'].";"?>"><img src="../public/img/edit.png" alt="Editar"></a>
                <a class="Deletar" href="<?php echo "Controllers/ControllerDeleteAutor.php?id={$row['ID']}"; ?>"><img src="../public/img/delete.png" alt="Deletar"></a>
            </td>


        </tr>

        <?php  
        }?>
    </table>
</div>

<?php 
    include("Footer.php")
?>